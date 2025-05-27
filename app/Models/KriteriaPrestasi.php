<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPrestasi extends Model
{
    use HasFactory;

    protected $table = 'kriteria_prestasi';
    protected $guarded = [];

    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function nilaiPrestasi()
    {
        return $this->hasMany(NilaiPrestasi::class);
    }

    public function normalisasiPrestasi()
    {
        return $this->hasMany(NormalisasiPrestasi::class);
    }
}
