<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesanDetail extends Model
{
  protected $table = 't_pesan_d';
  protected $fillable = ['t_pesan_h_id','m_barang_id','jumlah','users_id'];
  public $timestamps = false;

  public function barang()
  {
    return $this->belongsTo('App\Barang','m_barang_id');
  }

  public function pesan()
  {
    return $this->belongsTo('App\Pesan','t_pesan_h_id');
  }
}
