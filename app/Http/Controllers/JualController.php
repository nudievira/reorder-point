<?php

namespace App\Http\Controllers;

use App\Jual;
use Illuminate\Http\Request;
use App\Barang;
use Auth;
use DB;
use App\JualDetail;
use PDF;
class JualController extends Controller
{
  private $folder = 'jual';
  private $rules = [
      'nomor' => 'required' //|unique:jenisbarang
  ];

  public function index()
  {
    $data = Jual::orderBy('id','DESC')->get();
    return view($this->folder.'.index',compact('data'));
  }

  private function GenerateNomor()
  {
    $year = date('Y');
    $userid = Auth::user()->id;
    $data = DB::table('t_jual_h')->where(DB::raw('year(tanggal)'),$year)->max('nomor');
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
    return view($this->folder.'.create',compact('id','nomor','tanggal'));
  }


  public function getDetail($nomor)
  {
    // dd($nomor);
    $jual = Jual::where('nomor',$nomor)->first();
    $data = JualDetail::where('t_jual_h_id',$jual->id)->get();
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
    $stok_akhir = stok_akhir($request->m_barang_id);
    if($stok_akhir<=0)
    {
      $info = array(
        'info' => 'Maaf, Stok Minus',
        'status' => 'error'
      );
      return $info;
    }

    if($stok_akhir<=$request->jumlah)
    {
      $info = array(
        'info' => 'Maaf, Nama Barang '.$request->nama_barang.' Jumlah melebihi stok',
        'status' => 'error'
      );
      return $info;
    }
    $data_h = Jual::where('nomor',$request->nomor)->first();
    if(!$data_h)
    {
      $data_h = new Jual;
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

    $data_d = JualDetail::where('t_jual_h_id',$data_h->id)->where('m_barang_id',$request->m_barang_id)->first();
    if(!$data_d)
    {
      $data_d = new JualDetail;
    }
    $data_d->t_jual_h_id = $data_h->id;
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
    $data = Jual::where('nomor',$nomor)->first();
    $dataDetail = JualDetail::where('t_jual_h_id',$data->id)->get();
    $pdf = PDF::loadView($this->folder.'.cetakPDF', compact('data','dataDetail'));
    return $pdf->download($nomor.'-penjualan.pdf');
  }


  public function edit($id)
  {
    $data = Jual::where('id',$id)->first();
    $nomor = $data->nomor;
    $tanggal = tgl_str($data->tanggal);
    return view($this->folder.'.create',compact('id','nomor','tanggal'));
  }


  public function deleteDetail(Request $request)
  {
    // dd($request->id);
    // JualDetail::where('id',$request->id)->delete();
    $detail = JualDetail::where('id',$request->id)->first();
    $data = JualDetail::where('t_jual_h_id',$detail->t_jual_h_id)->count();
    // dd($data);
    JualDetail::where('id',$request->id)->delete();
    if($data==1)
    {
      Jual::where('id',$detail->t_jual_h_id)->delete();
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
    Jual::FindOrFail($id)->delete();
    JualDetail::where('t_jual_h_id',$id)->delete();
    notify()->flash('Delete Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect($this->folder);
  }
}
