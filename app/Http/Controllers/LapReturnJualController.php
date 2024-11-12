<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\ReturnJual;
use App\ReturnJualDetail;
use PDF;
use App\ReturnTerima;
use App\ReturnTerimaDetail;

class LapReturnJualController extends Controller
{
  private $rules = [
      'tgl1' => 'required',
      'tgl2' => 'required',
  ];

  public function index()
  {
    $list_barang = Barang::all();
    $list_returnjual = ReturnTerima::all();

    return view('lapreturnjual.index',compact('list_barang','list_returnjual'));
  }

  public function getData(Request $request)
  {
    $tgl1 = tgl_sql($request->tgl1);
    $tgl2 = tgl_sql($request->tgl2);
    $nomor = $request->nomor;
    $kode = $request->kode;

    $data = ReturnTerimaDetail::
    join('t_jual_return_h','t_jual_return_h.id','=','t_jual_return_d.t_jual_return_h_id')
    ->where('t_jual_return_h.tanggal','>=',$tgl1)
    ->where('t_jual_return_h.tanggal','<=',$tgl2)
    ->when($nomor, function ($query) use ($nomor) {
        return $query->where('t_jual_return_h.nomor', $nomor);
    })
    ->when($kode, function ($query) use ($kode) {
        return $query->where('m_barang_id', $kode);
    })
    ->orderBy('t_jual_return_h.nomor','ASC')
    ->get();
    // dd($data);
    return view('lapreturnjual.detail',compact('data'));
  }

  public function cetak(Request $request)
  {
    $this->validate($request,$this->rules);

    $tgl1 = tgl_sql($request->tgl1);
    $tgl2 = tgl_sql($request->tgl2);
    $nomor = $request->nomor;
    $kode = $request->kode;

    $data = ReturnTerimaDetail::
    join('t_jual_return_h','t_jual_return_h.id','=','t_jual_return_d.t_jual_return_h_id')
    ->where('t_jual_return_h.tanggal','>=',$tgl1)
    ->where('t_jual_return_h.tanggal','<=',$tgl2)
    ->when($nomor, function ($query) use ($nomor) {
        return $query->where('t_jual_return_h.nomor', $nomor);
    })
    ->when($kode, function ($query) use ($kode) {
        return $query->where('m_barang_id', $kode);
    })
    ->orderBy('t_jual_return_h.nomor','ASC')
    ->get();
    $pdf = PDF::loadView('lapreturnjual.cetakPDF', compact('data'));
    return $pdf->download('Laporan Return Penjualan Barang.pdf');
  }
}
