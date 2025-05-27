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

    // Siswa->nilai Prestasi
    /*
    public function getNilaiMatematikaAttribute()
    {
        return $this->nilaiPrestasi
            ? $this->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Matematika')?->nilai_prestasi
            : null;
    }

    public function getNilaiBahasaAttribute()
    {
        return $this->nilaiPrestasi
            ? $this->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Bahasa Indonesia')?->nilai_prestasi
            : null;
    }

    public function getNilaiIlmuPengetahuanAlamAttribute()
    {
        return $this->nilaiPrestasi
            ? $this->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Ilmu Pengetahuan Alam')?->nilai_prestasi
            : null;
    }

    public function getNilaiIlmuPengetahuanSosiaAttribute()
    {
        return $this->nilaiPrestasi
            ? $this->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Ilmu Pengetahuan Sosial')?->nilai_prestasi
            : null;
    }

    public function getNilaiPendidikanAgamaIslamAttribute()
    {
        return $this->nilaiPrestasi
            ? $this->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Pendidikan Agama Islam')?->nilai_prestasi
            : null;
    }

    public function getNilaiPendidikanKewarnegaraanAttribute()
    {
        return $this->nilaiPrestasi
            ? $this->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Pendidikan Kewarnegaraan')?->nilai_prestasi
            : null;
    }
            */
}
