<?php

namespace App\Http\Controllers;

use App\ReturnJual;
use Illuminate\Http\Request;
use App\Barang;
use Auth;
use DB;
use App\ReturnJualDetail;
use PDF;
use App\Jual;
use App\JualDetail;

class ReturnJualController extends Controller
{
  private $folder = 'return_jual';
  private $rules = [
      'nomor' => 'required' //|unique:jenisbarang
  ];

  public function index()
  {
    $data = ReturnJual::orderBy('id','DESC')->get();
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
    $tanggal = date('d-m-Y');
    $id=null;
    $list_jual = Jual::all();
    $nomor_jual = null;
    $disabled =  '';
    return view($this->folder.'.create',compact('id','nomor','tanggal','list_jual','nomor_jual','disabled'));
  }


  public function getDetail($nomor)
  {
    // dd($nomor);
    $jual_return = ReturnJual::where('nomor',$nomor)->first();
    $data = ReturnJualDetail::where('t_jual_return_h_id',$jual_return->id)->get();
    return view($this->folder.'.detail',compact('data'));
  }

  public function getDataBarang($kode)
  {
    $data = Barang::with('satuan')->where('kode',$kode)->first();
    // dd($data->satuan->satuan);
    return $data;
  }

  public function store(Request $request)
  {
    $data_h = ReturnJual::where('nomor',$request->nomor)->first();
    if(!$data_h)
    {
      $data_h = new ReturnJual;
      $data_h->t_jual_h_id = $request->t_jual_h_id;
    }
    // die;
    // dd($request->all());
    $data_h->nomor = $request->nomor;
    $data_h->tanggal = tgl_sql($request->tanggal);
    $data_h->users_id = Auth::user()->id;
    $data_h->save();

    $data_d = ReturnJualDetail::where('t_jual_return_h_id',$data_h->id)->where('m_barang_id',$request->m_barang_id)->first();
    if(!$data_d)
    {
      $data_d = new ReturnJualDetail;
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
    $barang = JualDetail::where('t_jual_h_id',$id)->get();
    echo "<option value=''>-Pilih-</option>";
    foreach($barang as $row)
    {
      echo "<option value=".$row->barang->kode.">".$row->barang->kode."</option>";
    }
  }


  public function show($nomor)
  {
    // dd($nomor);
    $data = ReturnJual::where('nomor',$nomor)->first();
    $dataDetail = ReturnJualDetail::where('t_jual_return_h_id',$data->id)->get();
    // dd($dataDetail);
    $pdf = PDF::loadView($this->folder.'.cetakPDF', compact('data','dataDetail'));
    return $pdf->download($nomor.'-return-penjualan.pdf');
  }


  public function edit($id)
  {
    $data = ReturnJual::where('id',$id)->first();
    $nomor = $data->nomor;
    $tanggal = tgl_str($data->tanggal);
    $nomor_jual = $data->jual['nomor'];
    // dd($data);

    $list_jual = Jual::all();
    $disabled = 'disabled="true"';
    return view($this->folder.'.create',compact('id','nomor','tanggal','list_jual','nomor_jual','disabled'));
  }


  public function deleteDetail(Request $request)
  {
    // dd($request->id);
    ReturnJualDetail::where('id',$request->id)->delete();
    $info = array(
      'info' => 'ID : '.$request->id.' Delete Success',
      'status' => 'success'
    );
    return $info;
  }
  public function destroy($id)
  {
    ReturnJual::FindOrFail($id)->delete();
    ReturnJualDetail::where('t_jual_return_h_id',$id)->delete();
    notify()->flash('Delete Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect($this->folder);
  }
}
