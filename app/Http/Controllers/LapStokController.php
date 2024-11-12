<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\SatuanBarang;
use App\JenisBarang;
use PDF;

class LapStokController extends Controller
{

  public function index()
  {
    $list_barang = Barang::all();
    $list_satuan = SatuanBarang::all();
    $list_jenis = JenisBarang::all();
    return view('lapstok.index',compact('list_barang','list_satuan','list_jenis'));
  }

  public function getData(Request $request)
  {
    // dd($request->all());
    $kode = $request->kode;
    $satuan = $request->satuan;
    $jenis = $request->jenis;

    $data = Barang::
    when($kode, function ($query) use ($kode) {
        return $query->where('id', $kode);
    })
    ->when($satuan, function ($query) use ($satuan) {
        return $query->where('m_satuan_id', $satuan);
    })
    ->when($jenis, function ($query) use ($jenis) {
        return $query->where('m_jenis_id', $jenis);
    })
    // ->orderBy('nomor','DESC')
    ->get();
    return view('lapstok.detail',compact('data'));
  }

  public function cetak(Request $request)
  {
    // dd($request->all());
    $kode = $request->kode;
    $satuan = $request->satuan;
    $jenis = $request->jenis;

    $data = Barang::
    when($kode, function ($query) use ($kode) {
        return $query->where('id', $kode);
    })
    ->when($satuan, function ($query) use ($satuan) {
        return $query->where('m_satuan_id', $satuan);
    })
    ->when($jenis, function ($query) use ($jenis) {
        return $query->where('m_jenis_id', $jenis);
    })
    // ->orderBy('nomor','DESC')
    ->get();
    $pdf = PDF::loadView('lapstok.cetakPDF', compact('data'));
    return $pdf->download('Laporan Stok Barang.pdf');
  }
}
