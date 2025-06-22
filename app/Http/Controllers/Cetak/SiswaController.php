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

    public function printPdf(Request $request)
    {
        // Filter siswa berdasarkan tahun ajaran
        $tahunAjaran = $request->input('tahun_ajaran');
        $siswas = Siswa::when($tahunAjaran, function ($query) use ($tahunAjaran) {
            return $query->where('tahun_ajaran', $tahunAjaran);
        })->get();

        $html = view('cetak.siswa.print', ['siswas' => $siswas])->render();

        $path = public_path('hasil.pdf');

        Browsershot::html($html)
            ->format('A4')
            ->landscape()
            ->margins(10, 0, 10, 0)
            ->showBackground()
            ->noSandbox()
            ->save($path);

        // Berikan respons download file PDF
        return response()->download($path)->deleteFileAfterSend(true);


        /*  
        $tahunAjaran= $request->input('tahun_ajaran');
        $siswas     = Siswa::when($tahunAjaran, function ($query) use ($tahunAjaran) {
            return $query->where('tahun_ajaran', $tahunAjaran);
        })->get();

        $html = view('cetak.siswa.print', [
            'siswas' => $siswas,
        ])->render();

        Browsershot::html($html)
            ->format('A4')
            ->landscape()
            ->margins(10, 0, 10, 0)
            ->showBackground()
            ->noSandbox()
            ->save(public_path('hasil.pdf'));
        
        return response($pdf)
            ->header('Content-Type', 'application/pdf');
        */
    }
}
