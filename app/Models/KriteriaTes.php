<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaTes extends Model
{
    use HasFactory;

    protected $table = 'kriteria_tes';
    protected $guarded = [];

       public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    
       public function nilaiTes()
    {
        return $this->hasOne(NilaiTes::class);
    }

     public function normalisasiTes()
    {
        return $this->belongsToMany(NormalisasiTes::class, 'kriteria_tes', 'normalisasi_tes');
    }
}
