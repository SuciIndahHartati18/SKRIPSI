<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTes extends Model
{
    use HasFactory;
    protected $table = 'nilai_tes';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

     public function kriteriaTes()
    {
        return $this->belongsTo(KriteriaTes::class);
    }
}
