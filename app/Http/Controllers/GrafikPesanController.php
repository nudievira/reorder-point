<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesan;
use App\PesanDetail;
use DB;
class GrafikPesanController extends Controller
{
  public function index()
  {
    $tahun = date('Y');
    // $bulan = 8;
    $data = array(['Bulan','Total']);
    for($bulan=1;$bulan<=12;$bulan++)
    {
      $temp = array(
        getBulan($bulan),
        intval($this->total($tahun,$bulan))
      );
      array_push($data,$temp);
    }
    $value =  json_encode($data);
    // var_dump($value);die;
    // dd($data);
    return view('grafikpesan.index',compact('tahun','value'));
  }

  private function total($tahun,$bulan)
  {
    $data = DB::table('t_pesan_d')
    ->join('t_pesan_h','t_pesan_h.id','=','t_pesan_d.t_pesan_h_id')
    // ->select(DB::raw('count(*) as total'))
    ->whereYear('tanggal', '=', $tahun)
    ->whereMonth('tanggal', '=', $bulan)
    ->count();
    return $data;
  }
}
