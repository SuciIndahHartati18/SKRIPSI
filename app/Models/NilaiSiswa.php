<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;
    protected $table = 'nilai_siswa';
    protected $guarded = [];

    public function siswa()
    {
      return  $this->belongsTo(Siswa::class);
    }

    public function kriteriaPrestasi ()
    {
      return $this->belongsTo(KriteriaPrestasi::class);
    }
}
