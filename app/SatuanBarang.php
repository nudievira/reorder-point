<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
  protected $table = 'm_satuan';
  protected $fillable = ['satuan'];
  public $timestamps = false;
}
