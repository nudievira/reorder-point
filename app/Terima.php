<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terima extends Model
{
  protected $table = 't_terima_h';
  protected $fillable = ['nomor','tanggal','m_supplier_id','users_id'];
  public $timestamps = false;

  public function detail()
  {
    return $this->hasMany('App\TerimaDetail','t_terima_h_id');
  }

  public function supplier()
  {
    return $this->belongsTo('App\Supplier','m_supplier_id');
  }

  public function user()
  {
    return $this->belongsTo('App\User','users_id');
  }
}
