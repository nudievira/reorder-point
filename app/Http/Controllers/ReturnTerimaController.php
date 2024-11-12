<?php

namespace App\Http\Controllers;

use App\ReturnTerima;
use Illuminate\Http\Request;
use App\Barang;
use Auth;
use DB;
use App\ReturnTerimaDetail;
use PDF;
use App\Jual;
use App\JualDetail;
use App\Terima;
use App\TerimaDetail;

class ReturnTerimaController extends Controller
{
  private $folder = 'return_terima';
  private $rules = [
      'nomor' => 'required' //|unique:jenisbarang
  ];

  public function index()
  {
    $data = ReturnTerima::orderBy('id','DESC')->get();
    return view($this->folder.'.index',compact('data'));
  }

  private function GenerateNomor()
  {
    $year = date('Y');
    $userid = Auth::user()->id;
    $data = DB::table('t_jual_return_h')->where(DB::raw('year(tanggal)'),$year)->max('nomor');
    if($data){
      $akhir = substr($data,6,6)+1;
      $hasil = sprintf("%06s", $akhir);
    }else{
      $hasil = '000001';
    }
    return $year.$userid.$hasil;
  }

  public function create()
  {
    $nomor = $this->GenerateNomor();
    $tanggal = null;//date('d-m-Y');
    $id=null;
    $list_jual = Terima::all();
    $nomor_jual = null;
    $disabled =  '';
    $supplier = null;
    return view($this->folder.'.create',compact('id','nomor','tanggal','list_jual','nomor_jual','disabled','supplier'));
  }


  public function getDetail($nomor)
  {
    // dd($nomor);
    $jual_return = ReturnTerima::where('nomor',$nomor)->first();
    $id_jual_return = $jual_return->id;
    $data = ReturnTerimaDetail::where('t_jual_return_h_id',$jual_return->id)->get();
    return view($this->folder.'.detail',compact('data','id_jual_return'));
  }

  public function getSupplier($id)
  {
    // dd($id);
    $terima = Terima::where('id',$id)->first();
    $supplier = $terima->supplier['nama'];
    // dd($supplier);
    $data['nama'] = $supplier;
    return $data;
  }

  public function getDataBarang($kode, $id_terima)
  {
    // dd($id_terima);
    $data = Barang::with('satuan')->where('kode',$kode)->first();
    if($data)
    {
      $terima = TerimaDetail::where('t_terima_h_id',$id_terima)->where('m_barang_id',$data->id)->first();
      if($terima)
      {
        $jml_terima = jmlReturnTerima($id_terima,$data->id);
        $jumlah = $terima->jumlah - $jml_terima;
      }else{
        $jumlah = 0;
      }
      $hasil = array(
        'nama' => $data->nama,
        'id' => $data->id,
        'satuan' => $data->satuan->satuan,
        'harga' => $data->harga,
        'jumlah' => $jumlah
      );
    }else{
      $hasil = array(
        'nama' => '',
        'id' => '',
        'satuan' => '',
        'harga' => 0,
        'jumlah' => 0
      );
    }
    // dd($data->satuan->satuan);
    return $hasil; //$data;
  }

  public function store(Request $request)
  {
    $data_h = ReturnTerima::where('nomor',$request->nomor)->first();
    if(!$data_h)
    {
      $data_h = new ReturnTerima;
      $data_h->t_jual_h_id = $request->t_jual_h_id;
    }
    // die;
    // dd($request->all());
    $data_h->nomor = $request->nomor;
    if($request->tanggal)
    {
      $data_h->tanggal = tgl_sql($request->tanggal);
    }
    $data_h->users_id = Auth::user()->id;
    $data_h->save();

    $data_d = ReturnTerimaDetail::where('t_jual_return_h_id',$data_h->id)->where('m_barang_id',$request->m_barang_id)->first();
    if(!$data_d)
    {
      $data_d = new ReturnTerimaDetail;
    }
    $data_d->t_jual_return_h_id = $data_h->id;
    $data_d->m_barang_id = $request->m_barang_id;
    $data_d->jumlah = $request->jumlah;
    $data_d->harga = $request->harga;
    $data_d->save();

    // notify()->flash('Create Success !', 'success', [
    //     'timer' => 3000,
    // ]);

    $info = array(
      'info' => 'Save Success',
      'status' => 'success'
    );

    return $info;

  }

  public function listBarang($id)
  {
    $barang = TerimaDetail::where('t_terima_h_id',$id)->get();
    echo "<option value=''>-Pilih-</option>";
    foreach($barang as $row)
    {
      echo "<option value=".$row->barang->kode.">".$row->barang->kode."</option>";
    }
  }


  public function show($nomor)
  {
    // dd($nomor);
    $data = ReturnTerima::where('nomor',$nomor)->first();
    $dataDetail = ReturnTerimaDetail::where('t_jual_return_h_id',$data->id)->get();
    // dd($dataDetail);
    $pdf = PDF::loadView($this->folder.'.cetakPDF', compact('data','dataDetail'));
    return $pdf->download($nomor.'-return-penerimaan.pdf');
  }


  public function edit($id)
  {
    $data = ReturnTerima::with('terima')->where('id',$id)->first();
    $nomor = $data->nomor;
    $tanggal = tgl_str($data->tanggal);
    $nomor_jual = $data->terima->nomor;
    $supplier = $data->terima->supplier->nama;
    // dd($supplier);
    // dd($data);

    $list_jual = Jual::all();
    $disabled = 'disabled="true"';
    return view($this->folder.'.create',compact('id','nomor','tanggal','list_jual','nomor_jual','disabled','supplier'));
  }


  public function deleteDetail(Request $request)
  {
    // dd($request->id);
    // ReturnTerimaDetail::where('id',$request->id)->delete();
    $detail = ReturnTerimaDetail::where('id',$request->id)->first();
    $data = ReturnTerimaDetail::where('t_jual_return_h_id',$detail->t_jual_return_h_id)->count();
    // dd($data);
    ReturnTerimaDetail::where('id',$request->id)->delete();
    if($data==1)
    {
      ReturnTerima::where('id',$detail->t_jual_return_h_id)->delete();
      $info = array(
        'info' => 'ID : '.$request->id.' Delete Success',
        'status' => 'last success'
      );
    }else{
      $info = array(
        'info' => 'ID : '.$request->id.' Delete Success',
        'status' => 'success'
      );
    }
    return $info;
  }
  public function destroy($id)
  {
    ReturnTerima::FindOrFail($id)->delete();
    ReturnTerimaDetail::where('t_jual_return_h_id',$id)->delete();
    notify()->flash('Delete Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect('returnterima');
  }
}
