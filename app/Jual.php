<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
  protected $table = 't_jual_h';
  protected $fillable = ['nomor','tanggal','users_id'];
  public $timestamps = false;

  public function detail()
  {
    return $this->hasMany('App\JualDetail','t_jual_h_id');
  }
  
  public function user()
  {
    return $this->belongsTo('App\User','users_id');
  }
}
