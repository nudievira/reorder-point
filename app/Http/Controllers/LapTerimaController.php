<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Terima;
use App\TerimaDetail;
use App\Supplier;
use PDF;

class LapTerimaController extends Controller
{
  private $rules = [
      'tgl1' => 'required',
      'tgl2' => 'required',
  ];
  public function index()
  {
    $list_barang = Barang::all();
    $list_terima = Terima::all();
    $list_supplier = Supplier::all();
    return view('lapterima.index',compact('list_barang','list_terima','list_supplier'));
  }

  public function getData(Request $request)
  {
    $tgl1 = tgl_sql($request->tgl1);
    $tgl2 = tgl_sql($request->tgl2);
    $nomor = $request->nomor;
    $kode = $request->kode;
    $supplier = $request->supplier;

    $data = TerimaDetail::
    join('t_terima_h','t_terima_h.id','=','t_terima_d.t_terima_h_id')
    ->where('t_terima_h.tanggal','>=',$tgl1)
    ->where('t_terima_h.tanggal','<=',$tgl2)
    ->when($nomor, function ($query) use ($nomor) {
        return $query->where('t_terima_h.nomor', $nomor);
    })
    ->when($supplier, function ($query) use ($supplier) {
        return $query->where('t_terima_h.m_supplier_id', $supplier);
    })
    ->when($kode, function ($query) use ($kode) {
        return $query->where('m_barang_id', $kode);
    })
    ->orderBy('t_terima_h.nomor','ASC')
    ->get();
    // dd($data);
    return view('lapterima.detail',compact('data'));
  }

  public function cetak(Request $request)
  {
    $this->validate($request,$this->rules);

    $tgl1 = tgl_sql($request->tgl1);
    $tgl2 = tgl_sql($request->tgl2);
    $nomor = $request->nomor;
    $kode = $request->kode;
    $supplier = $request->supplier;

    $data = TerimaDetail::
    join('t_terima_h','t_terima_h.id','=','t_terima_d.t_terima_h_id')
    ->where('t_terima_h.tanggal','>=',$tgl1)
    ->where('t_terima_h.tanggal','<=',$tgl2)
    ->when($nomor, function ($query) use ($nomor) {
        return $query->where('t_terima_h.nomor', $nomor);
    })
    ->when($supplier, function ($query) use ($supplier) {
        return $query->where('t_terima_h.m_supplier_id', $supplier);
    })
    ->when($kode, function ($query) use ($kode) {
        return $query->where('m_barang_id', $kode);
    })
    ->orderBy('t_terima_h.nomor','ASC')
    ->get();
    $pdf = PDF::loadView('lapterima.cetakPDF', compact('data'));
    return $pdf->download('Laporan Penerimaan Barang.pdf');
  }
}
