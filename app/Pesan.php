<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
  protected $table = 't_pesan_h';
  protected $fillable = ['nomor','tanggal','users_id'];
  public $timestamps = false;

  public function detail()
  {
    return $this->hasMany('App\PesanDetail','t_pesan_h_id');
  }

  public function user()
  {
    return $this->belongsTo('App\User','users_id');
  }
}
