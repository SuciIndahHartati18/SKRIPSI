<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalisasiTes extends Model
{
  use HasFactory;

  protected $table = 'normalisasi_tes';
  protected $guarded = [];

  public function siswa()
  {
    return  $this->belongsTo(Siswa::class);
  }

  public function kriteriaTes()
  {
    return  $this->belongsTo(KriteriaTes::class);
  }
}
