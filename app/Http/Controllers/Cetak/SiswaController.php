<?php

namespace App\Http\Controllers\Cetak;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Browsershot\Browsershot;

class SiswaController extends Controller
{
    public function preview()
    {
        $siswas = Siswa::all();

        return view('cetak.siswa.print', [
            'siswas' => $siswas,
        ]);
    }

    public function exportPdf()
    {
        $html = view('cetak.siswa.print', [
            'siswas' => Siswa::all(),
        ])->render();

        $folderPath = storage_path('app/public/cetak/siswa');
        $pdfPath = $folderPath . '/siswa.pdf';
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true); // true = recursive
        }

        Browsershot::html($html)
            ->format('A4')
            ->landscape()
            ->margins(0, 0, 0, 0)
            ->showBackground()
            ->savePdf($pdfPath);
        
        return response()->download($pdfPath);
    }
}
