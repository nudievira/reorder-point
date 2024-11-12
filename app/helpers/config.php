<?php
// Developement
// Programmer : Deddy Rusdiansyah,M.Kom
// Blog : deddyrusdiansyah.blogspot.cam
// HP : 087774846856

// use DB;

function getBulan($bln){
  switch ($bln){
    case 1:
      return "Januari";
      break;
    case 2:
      return "Februari";
      break;
    case 3:
      return "Maret";
      break;
    case 4:
      return "April";
      break;
    case 5:
      return "Mei";
      break;
    case 6:
      return "Juni";
      break;
    case 7:
      return "Juli";
      break;
    case 8:
      return "Agustus";
      break;
    case 9:
      return "September";
      break;
    case 10:
      return "Oktober";
      break;
    case 11:
      return "November";
      break;
    case 12:
      return "Desember";
      break;
  }
}

function tgl_str($date)
{
  $date = substr($date,0,10);
  $exp = explode('-',$date);
  if(count($exp) == 3) {
    $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
  }
  return $date;
}

function tgl_sql($date)
{
  $exp = explode('-',$date);
  if(count($exp) == 3) {
    $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
  }
  return $date;
}

function stok_akhir($barang_id)
{
  $stok = stok_awal($barang_id)+(terima_qty($barang_id)-return_jual_qty($barang_id))-jual_qty($barang_id);
  return $stok;
}

function stok_awal($barang_id)
{
  $data = App\Barang::where('id',$barang_id)->sum('stok_awal');
  return $data;
}

function terima_qty($barang_id)
{
  $data = App\TerimaDetail::where('m_barang_id',$barang_id)->sum('jumlah');
  return $data;
}

function jual_qty($barang_id)
{
  $data = App\JualDetail::where('m_barang_id',$barang_id)->sum('jumlah');
  return $data;
}

function return_jual_qty($barang_id)
{
  $data = App\ReturnJualDetail::where('m_barang_id',$barang_id)->sum('jumlah');
  return $data;
}

function getSS($barang_id)
{
  $data = App\SaftyStock::where('m_barang_id',$barang_id)->first();
  // dd($data);
  if($data)
  {
    $ss = ($data->max - $data->rerata) * $data->leadtime;
  }else{
    $ss = 0;
  }
  return $ss;
}

function saftystock($max,$rerata,$leadtime)
{
  $ss = ($max - $rerata) * $leadtime;
  return $ss;
}

function status_ss($barang_id,$ss)
{
  $stok_akhir = stok_akhir($barang_id);
  if($stok_akhir<=$ss)
  {
    $status = '<span class="label label-danger">Warning</span>';
  }else{
    $status = '<span class="label label-success">Safty</span>';
  }
  return $status;
}

function getROP($barang_id,$ss)
{
  $data = App\ROP::where('m_barang_id',$barang_id)->first();
  // dd($data);
  if($data)
  {
    // $ss = ($data->max - $data->rerata) * $data->leadtime;
    $rop = ($data->daily*$data->delivery_leadtime)+$ss;
  }else{
    // $ss = 0;
    $rop = 0;
  }
  return $rop;
}

function rop($daily,$delivery_leadtime,$ss)
{
  $rop = ($daily*$delivery_leadtime)+$ss;
  return $rop;
}

function status_rop($barang_id,$rop)
{
  $stok_akhir = stok_akhir($barang_id);
  if($stok_akhir<=$rop)
  {
    $status = '<span class="label label-danger">Reorder Point</span>';
  }else{
    $status = '';//''<span class="label label-success">Safty</span>';
  }
  return $status;
}

function sisaTerima($id_terima,$id_barang)
{

}
function jmlReturnTerima($id_terima,$id_barang)
{
  // $hasil = App\ReturnTerimaDetail::where('t_jual_return_h_id',$id_terima)->where('m_barang_id',$id_barang)->sum('jumlah');
  $hasil = DB::table('t_jual_return_d as a')
  ->join('t_jual_return_h as b','a.t_jual_return_h_id','=','b.id')
  ->where('b.t_jual_h_id',$id_terima)
  ->where('a.m_barang_id',$id_barang)
  ->sum('jumlah');
  // dd($hasil);
  // $hasil = ' - '.$id_terima.' - '.$id_barang;
  return $hasil;
}
// function updateJmlTerima($id_terima,$id_barang,$status)
// {
//   if($status=='tambah')
//   {
//
//   }else{
//
//   }
// }
?>
