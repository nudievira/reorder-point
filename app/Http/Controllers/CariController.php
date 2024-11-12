<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
class CariController extends Controller
{
  public function index(Request $request)
  {
    // dd($request->all());
    $q = $request->q;
    $data = Barang::where('kode','LIKE','%'.$q.'%')
    ->Orwhere('nama','LIKE','%'.$q.'%')
    ->get();
    return view('cari.index',compact('data'));
  }
}
