<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaftyStock extends Model
{
  protected $table = 'm_safty_stock';
  protected $fillable = ['m_barang_id','max','rerata','leadtime','users_id'];
  public $timestamps = false;

  public function barang()
  {
    return $this->belongsTo('App\Barang','m_barang_id');
  }
}
