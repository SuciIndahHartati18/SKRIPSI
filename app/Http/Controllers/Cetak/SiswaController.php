<?php

namespace App\Http\Controllers\Cetak;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function preview()
    {
        $siswas = Siswa::all();

        return view('cetak.siswa.print', [
            'siswas' => $siswas,
        ]);
    }
}
