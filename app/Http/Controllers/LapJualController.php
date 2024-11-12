<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Jual;
use App\JualDetail;
use PDF;

class LapJualController extends Controller
{
  private $rules = [
      'tgl1' => 'required',
      'tgl2' => 'required',
  ];

  public function index()
  {
    $list_barang = Barang::all();
    $list_jual = Jual::all();

    return view('lapjual.index',compact('list_barang','list_jual'));
  }

  public function getData(Request $request)
  {
    $tgl1 = tgl_sql($request->tgl1);
    $tgl2 = tgl_sql($request->tgl2);
    $nomor = $request->nomor;
    $kode = $request->kode;

    $data = JualDetail::
    join('t_jual_h','t_jual_h.id','=','t_jual_d.t_jual_h_id')
    ->where('t_jual_h.tanggal','>=',$tgl1)
    ->where('t_jual_h.tanggal','<=',$tgl2)
    ->when($nomor, function ($query) use ($nomor) {
        return $query->where('t_jual_h.nomor', $nomor);
    })
    ->when($kode, function ($query) use ($kode) {
        return $query->where('m_barang_id', $kode);
    })
    ->orderBy('t_jual_h.nomor','ASC')
    ->get();
    // dd($data);
    return view('lapjual.detail',compact('data'));
  }

  public function cetak(Request $request)
  {
    // dd($request->all());
    $this->validate($request,$this->rules);

    $tgl1 = tgl_sql($request->tgl1);
    $tgl2 = tgl_sql($request->tgl2);
    $nomor = $request->nomor;
    $kode = $request->kode;

    $data = JualDetail::
    join('t_jual_h','t_jual_h.id','=','t_jual_d.t_jual_h_id')
    ->where('t_jual_h.tanggal','>=',$tgl1)
    ->where('t_jual_h.tanggal','<=',$tgl2)
    ->when($nomor, function ($query) use ($nomor) {
        return $query->where('t_jual_h.nomor', $nomor);
    })
    ->when($kode, function ($query) use ($kode) {
        return $query->where('m_barang_id', $kode);
    })
    ->orderBy('t_jual_h.nomor','ASC')
    ->get();
    $pdf = PDF::loadView('lapjual.cetakPDF', compact('data'));
    return $pdf->download('Laporan Penjualan Barang.pdf');
  }
}
