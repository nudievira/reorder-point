<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $table = 'm_supplier';
  protected $fillable = ['kode','nama','alamat','hp'];
  public $timestamps = false;
}
