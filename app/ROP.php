<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ROP extends Model
{
  protected $table = 'm_rop';
  protected $fillable = ['m_barang_id','daily','delivery_leadtime','users_id'];
  public $timestamps = false;

  public function barang()
  {
    return $this->belongsTo('App\Barang','m_barang_id');
  }
}
