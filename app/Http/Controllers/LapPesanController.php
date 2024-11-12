<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pesan;
use App\PesanDetail;
use PDF;

class LapPesanController extends Controller
{
  private $rules = [
      'tgl1' => 'required',
      'tgl2' => 'required',
  ];

  public function index()
  {
    $list_barang = Barang::all();
    $list_pesan = Pesan::all();
    return view('lappesan.index',compact('list_barang','list_pesan'));
  }

  public function getData(Request $request)
  {
    $tgl1 = tgl_sql($request->tgl1);
    $tgl2 = tgl_sql($request->tgl2);
    $nomor = $request->nomor;
    $kode = $request->kode;

    $data = PesanDetail::
    join('t_pesan_h','t_pesan_h.id','=','t_pesan_d.t_pesan_h_id')
    ->where('t_pesan_h.tanggal','>=',$tgl1)
    ->where('t_pesan_h.tanggal','<=',$tgl2)
    ->when($nomor, function ($query) use ($nomor) {
        return $query->where('t_pesan_h.nomor', $nomor);
    })
    ->when($kode, function ($query) use ($kode) {
        return $query->where('m_barang_id', $kode);
    })
    ->orderBy('t_pesan_h.nomor','ASC')
    ->get();
    // dd($data);
    return view('lappesan.detail',compact('data'));
  }

  public function cetak(Request $request)
  {
    // dd($request->all());
    $this->validate($request,$this->rules);

    $tgl1 = tgl_sql($request->tgl1);
    $tgl2 = tgl_sql($request->tgl2);
    $nomor = $request->nomor;
    $kode = $request->kode;

    $data = PesanDetail::
    join('t_pesan_h','t_pesan_h.id','=','t_pesan_d.t_pesan_h_id')
    ->where('t_pesan_h.tanggal','>=',$tgl1)
    ->where('t_pesan_h.tanggal','<=',$tgl2)
    ->when($nomor, function ($query) use ($nomor) {
        return $query->where('t_pesan_h.nomor', $nomor);
    })
    ->when($kode, function ($query) use ($kode) {
        return $query->where('m_barang_id', $kode);
    })
    ->orderBy('t_pesan_h.nomor','ASC')
    ->get();
    $pdf = PDF::loadView('lappesan.cetakPDF', compact('data'));
    return $pdf->download('Laporan Pemesanan Barang.pdf');
  }
}
