<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerimaDetail extends Model
{
  protected $table = 't_terima_d';
  protected $fillable = ['t_terima_h_id','m_barang_id','jumlah','users_id'];
  public $timestamps = false;

  public function barang()
  {
    return $this->belongsTo('App\Barang','m_barang_id');
  }

  public function terima()
  {
    return $this->belongsTo('App\Terima','t_terima_h_id');
  }
}
