<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnJualDetail extends Model
{
  protected $table = 't_jual_return_d';
  protected $fillable = ['t_jual_return_h_id','m_barang_id','jumlah','users_id'];
  public $timestamps = false;

  public function barang()
  {
    return $this->belongsTo('App\Barang','m_barang_id');
  }

  public function returnjual()
  {
    return $this->belongsTo('App\ReturnJual','t_jual_return_h_id');
  }
}
