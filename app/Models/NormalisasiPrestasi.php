<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalisasiPrestasi extends Model
{
    use HasFactory;

    protected $table = 'normalisasi_prestasi';
    protected $guarded = [];

     public function siswa()
    {
      return  $this->belongsTo(Siswa::class);
    }

    public function kriteriaPrestasi ()
    {
      return $this->belongsToMany(KriteriaPrestasi::class, 'kriteria_normalisasi_prestasi');
    }
}

