<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table = 'm_barang';
  protected $fillable = ['kode','nama','m_satuan_id','m_jenis_id','harga','stok_awal','gambar','users_id'];
  public $timestamps = false;

  public function satuan()
  {
    return $this->belongsTo('App\SatuanBarang','m_satuan_id');
  }

  public function jenis()
  {
    return $this->belongsTo('App\JenisBarang','m_jenis_id');
  }
}
