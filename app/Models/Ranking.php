<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
    protected $table    = 'ranking';
    protected $guarded  = [];

    public function siswa()
    {
      return  $this->belongsTo(Siswa::class);
    }
}
