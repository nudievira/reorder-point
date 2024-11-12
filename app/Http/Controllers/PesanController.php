<?php

namespace App\Http\Controllers;

use App\Pesan;
use Illuminate\Http\Request;
use App\Barang;
use Auth;
use DB;
use App\PesanDetail;
use PDF;

class PesanController extends Controller
{
    private $folder = 'pesan';
    private $rules = [
        'nomor' => 'required' //|unique:jenisbarang
    ];

    public function index()
    {
      $data = Pesan::orderBy('id','DESC')->get();
      return view($this->folder.'.index',compact('data'));
    }

    private function GenerateNomor()
    {
      $year = date('Y');
      $userid = Auth::user()->id;
      $data = DB::table('t_pesan_h')->where(DB::raw('year(tanggal)'),$year)->max('nomor');
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
      // $tanggal = date('d-m-Y');
      $id=null;
      return view($this->folder.'.create',compact('id','nomor','tanggal'));
    }


    public function getDetail($nomor)
    {
      // dd($nomor);
      $pesan = Pesan::where('nomor',$nomor)->first();
      // if($pesan==null)
      // {
      //   $data = Pesan::orderBy('id','DESC')->get();
      //   return view($this->folder.'.index',compact('data'));
      // }
      $data = PesanDetail::where('t_pesan_h_id',$pesan->id)->get();
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
      $data_h = Pesan::where('nomor',$request->nomor)->first();
      if(!$data_h)
      {
        $data_h = new Pesan;
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

      $data_d = PesanDetail::where('t_pesan_h_id',$data_h->id)->where('m_barang_id',$request->m_barang_id)->first();
      if(!$data_d)
      {
        $data_d = new PesanDetail;
      }
      $data_d->t_pesan_h_id = $data_h->id;
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
      $data = Pesan::where('nomor',$nomor)->first();
      $dataDetail = PesanDetail::where('t_pesan_h_id',$data->id)->get();
      $pdf = PDF::loadView($this->folder.'.cetakPDF', compact('data','dataDetail'));
      return $pdf->download($nomor.'-pesanan.pdf');
    }


    public function edit($id)
    {
      $data = Pesan::where('id',$id)->first();
      if($data!=null)
      {
        $nomor = $data->nomor;
        $tanggal = tgl_str($data->tanggal);
        return view($this->folder.'.create',compact('id','nomor','tanggal'));
      }else{
        $data = Pesan::orderBy('id','DESC')->get();
        return view($this->folder.'.index',compact('data'));
      }

    }


    public function update(Request $request, Pesan $pesan)
    {
        //
    }

    public function deleteDetail(Request $request)
    {
      // dd($request->all());
      $detail = PesanDetail::where('id',$request->id)->first();
      $data = PesanDetail::where('t_pesan_h_id',$detail->t_pesan_h_id)->count();
      // dd($data);
      PesanDetail::where('id',$request->id)->delete();
      if($data==1)
      {
        Pesan::where('id',$detail->t_pesan_h_id)->delete();
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
      Pesan::FindOrFail($id)->delete();
      PesanDetail::where('t_pesan_h_id',$id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}