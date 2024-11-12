<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JualDetail extends Model
{
  protected $table = 't_jual_d';
  protected $fillable = ['t_jual_h_id','m_barang_id','jumlah','users_id'];
  public $timestamps = false;

  public function barang()
  {
    return $this->belongsTo('App\Barang','m_barang_id');
  }

  public function jual()
  {
    return $this->belongsTo('App\Jual','t_jual_h_id');
  }
}
