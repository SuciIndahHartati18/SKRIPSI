<?php

namespace App\Http\Controllers\Cetak;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksiPrestasi;
use Illuminate\Http\Request;

class HasilSeleksiPrestasiLulusController extends Controller
{
    public function preview()
    {
        $hasilSeleksiPrestasi = HasilSeleksiPrestasi::all();

        return view('cetak.hasil_seleksi_prestasi_lulus.print', [
            'hasilSeleksiPrestasi' => $hasilSeleksiPrestasi,
        ]);
    }
}
