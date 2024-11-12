<?php

namespace App\Http\Controllers;

use App\Terima;
use Illuminate\Http\Request;
use App\Barang;
use Auth;
use DB;
use App\TerimaDetail;
use PDF;
use App\Supplier;

class TerimaController extends Controller
{
  private $folder = 'terima';
  private $rules = [
      'nomor' => 'required',
      'm_supplier_id' => 'required'
  ];

  public function index()
  {
    $data = Terima::orderBy('id','DESC')->get();
    return view($this->folder.'.index',compact('data'));
  }

  private function GenerateNomor()
  {
    $year = date('Y');
    $userid = Auth::user()->id;
    $data = DB::table('t_terima_h')->where(DB::raw('year(tanggal)'),$year)->max('nomor');
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
    $list_supplier = Supplier::all();
    $supp = null;
    return view($this->folder.'.create',compact('id','nomor','tanggal','list_supplier','supp'));
  }


  public function getDetail($nomor)
  {
    // dd($nomor);
    $terima = Terima::where('nomor',$nomor)->first();
    $data = TerimaDetail::where('t_terima_h_id',$terima->id)->get();
    // dd($data);
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
    $data_h = Terima::where('nomor',$request->nomor)->first();
    if(!$data_h)
    {
      $data_h = new Terima;
    }
    // die;
    // dd($request->all());
    $data_h->m_supplier_id = $request->m_supplier_id;
    $data_h->nomor = $request->nomor;
    if($request->tanggal)
    {
      $data_h->tanggal = tgl_sql($request->tanggal);
    }

    $data_h->users_id = Auth::user()->id;
    $data_h->save();

    $data_d = TerimaDetail::where('t_terima_h_id',$data_h->id)->where('m_barang_id',$request->m_barang_id)->first();
    if(!$data_d)
    {
      $data_d = new TerimaDetail;
    }
    $data_d->t_terima_h_id = $data_h->id;
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

  public function show($nomor)
  {
    // dd($nomor);
    $data = Terima::where('nomor',$nomor)->first();
    $dataDetail = TerimaDetail::where('t_terima_h_id',$data->id)->get();
    $pdf = PDF::loadView($this->folder.'.cetakPDF', compact('data','dataDetail'));
    return $pdf->download($nomor.'-penerimaan.pdf');
  }


  public function edit($id)
  {
    $data = Terima::where('id',$id)->first();
    $nomor = $data->nomor;
    $tanggal = tgl_str($data->tanggal);
    $list_supplier = Supplier::all();
    $supp = $data->m_supplier_id;
    return view($this->folder.'.create',compact('id','nomor','tanggal','list_supplier','supp'));
  }


  public function deleteDetail(Request $request)
  {
    // dd($request->id);
    // TerimaDetail::where('id',$request->id)->delete();
    $detail = TerimaDetail::where('id',$request->id)->first();
    $data = TerimaDetail::where('t_terima_h_id',$detail->t_terima_h_id)->count();
    // dd($data);
    TerimaDetail::where('id',$request->id)->delete();
    if($data==1)
    {
      Terima::where('id',$detail->t_terima_h_id)->delete();
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
    Terima::FindOrFail($id)->delete();
    TerimaDetail::where('t_terima_h_id',$id)->delete();
    notify()->flash('Delete Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect($this->folder);
  }
}
