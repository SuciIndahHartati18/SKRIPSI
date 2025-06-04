<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $guarded = [];

    public function hasilSeleksiTes()
    {
        return  $this->hasMany(HasilSeleksiTes::class);
    }

    public function nilaiTes()
    {
        return $this->hasMany(NilaiTes::class);
    }

    public function KriteriaTes()
    {
        return $this->hasMany(KriteriaTes::class);
    }

    public function NormalisasiTes()
    {
        return $this->hasMany(NormalisasiTes::class);
    }

    public function KriteriaPrestasi()
    {
        return $this->hasMany(KriteriaPrestasi::class);
    }

    public function nilaiPrestasi()
    {
        return $this->hasMany(NilaiPrestasi::class);
    }

    public function NormalisasiPrestasi()
    {
        return $this->hasMany(NormalisasiPrestasi::class);
    }

    public function hasilSeleksiPrestasi()
    {
        return  $this->hasOne(HasilSeleksiPrestasi::class);
    }

    public function ranking()
    {
        return  $this->hasOne(Ranking::class);
    }
}
