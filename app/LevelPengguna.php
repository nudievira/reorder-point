<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelPengguna extends Model
{
  protected $table = 'users_level';
  protected $fillable = ['level'];
  public $timestamps = false;
}
