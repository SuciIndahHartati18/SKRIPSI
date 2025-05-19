<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSeleksiPrestasi extends Model
{
    use HasFactory;
    protected $table= 'hasil_seleksi_prestasi';
    protected $guarded= [];

    public function siswa()
    {
      return  $this->belongsTo(Siswa::class);
    }
}
