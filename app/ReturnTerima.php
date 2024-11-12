<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnTerima extends Model
{
  protected $table = 't_jual_return_h';
  protected $fillable = ['nomor','tanggal','users_id','t_jual_h_id'];
  public $timestamps = false;

  public function detail()
  {
    return $this->hasMany('App\ReturnTerimaDetail','t_jual_return_h_id');
  }

  public function jual()
  {
    return $this->hasOne('App\Jual','id','t_jual_h_id');
  }

  public function terima()
  {
    return $this->hasOne('App\Terima','id','t_jual_h_id');
  }
  public function user()
  {
    return $this->belongsTo('App\User','users_id');
  }
}
