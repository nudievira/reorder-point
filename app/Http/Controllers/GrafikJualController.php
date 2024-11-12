<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GrafikJualController extends Controller
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
    return view('grafikjual.index',compact('tahun','value'));
  }

  private function total($tahun,$bulan)
  {
    $data = DB::table('t_jual_d')
    ->join('t_jual_h','t_jual_h.id','=','t_jual_d.t_jual_h_id')
    // ->select(DB::raw('count(*) as total'))
    ->whereYear('tanggal', '=', $tahun)
    ->whereMonth('tanggal', '=', $bulan)
    ->count();
    return $data;
  }
}
