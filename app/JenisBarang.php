<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $table = 'm_jenis';
    protected $fillable = ['jenis'];
    public $timestamps = false;
    
}
