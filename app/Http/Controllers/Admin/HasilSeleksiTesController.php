<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksiTes;
use App\Models\NormalisasiTes;
use App\Models\Ranking;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class HasilSeleksiTesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $siswas = Siswa::has('normalisasiTes')->latest()->get();

        $selectedSiswa  = null;
        $normalisasiTes = [];

        if ($request->filled('siswa_id')) {
            $selectedSiswa = Siswa::find($request->siswa_id);

            if ($selectedSiswa) {
                $normalisasiTes = NormalisasiTes::with('kriteriaTes')
                    ->where('siswa_id', $selectedSiswa->id)->get();
            }
        }

        return view('admin.hasil_seleksi_tes.create', [
            'siswas'            => $siswas,
            'selectedSiswa'     => $selectedSiswa,
            'normalisasiTes'    => $normalisasiTes,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id'          => ['required', 'exists:siswa,id'],
        ]);
            
        // Cek apakah siswa dengan nama dan tahun ajaran yang sama sudah ada
        $siswa          = Siswa::findOrFail($request->siswa_id);
        $alreadyExists  = HasilSeleksiTes::whereHas('siswa', function ($query) use ($siswa) {
            $query->where('nama_siswa', $siswa->nama_siswa)
                ->where('tahun_ajaran', $siswa->tahun_ajaran);
        })->exists();

        if ($alreadyExists) {
            return back()->withErrors([
                'siswa_id' => 'Siswa dengan Nama dan Tahun Ajaran ini sudah memiliki "Hasil Seleksi Tes"!'
            ])->withInput();
        }

        $normalisasiTes = NormalisasiTes::with('kriteriaTes')
            ->where('siswa_id', $request->siswa_id)->get();

        // Hitung nilai Akhir dengan SAW
        $nilaiAkhir = 0;
        foreach ($normalisasiTes as $normalisasi) {
            $nilai      = $normalisasi->nilai_normalisasi_tes;
            $bobot      = $normalisasi->kriteriaTes->bobot_kriteria_tes;
            $nilaiAkhir += $nilai * $bobot;
        }

        HasilSeleksiTes::updateOrCreate([
            'siswa_id'          => $request->siswa_id,
            'nilai_akhir_tes'   => $nilaiAkhir,
            'ranking'           => '-', // Bisa diisi nanti saat proses perankingan
        ]);

        return redirect()->route('admin.perhitungan_jalur_tes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function show(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilSeleksiTes  $hasilSeleksiTes
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilSeleksiTes $hasilSeleksiTes)
    {
        //
    }

    // Rankingan
    public function editRanking(Request $request)
    {
        $tahunAjaran = Siswa::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        // Tahun ajaran yang dipilih dari filter
        $tahunDipilih = $request->input('tahun_ajaran');

        // Data hasil seleksi (kosong jika belum memilih tahun)
        $hasilSeleksi = collect();

        // Jika user memilih tahun, ambil hasil seleksi berdasarkan siswa yang punya tahun ajaran itu
        if ($tahunDipilih) {
            $hasilSeleksi = HasilSeleksiTes::with('siswa')
                ->whereHas('siswa', function ($query) use ($tahunDipilih) {
                    $query->where('tahun_ajaran', $tahunDipilih);
                })->orderByDesc('nilai_akhir_tes')->get();
        }

        return view('admin.hasil_seleksi_tes.edit-ranking', [
            'tahunAjaran'   => $tahunAjaran,
            'tahunDipilih'  => $tahunDipilih,
            'hasilSeleksi'  => $hasilSeleksi,
        ]);
    }

    public function updateRanking(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => ['required', 'string']
        ]);

        $tahunAjaran = $request->input('tahun_ajaran');

        // Ambil semua hasil seleksi tes yang terhubung dengan siswa tahun ajaran yang dipilih
        $hasilSeleksiTes = HasilSeleksiTes::with('siswa')
            ->whereHas('siswa', function ($query) use ($tahunAjaran) {
                $query->where('tahun_ajaran', $tahunAjaran);
            })->orderByDesc('nilai_akhir_tes')->get();

        // Proses pemberian ranking otomatis
        $ranking = 1;
        foreach ($hasilSeleksiTes as $item) {
            $item->update([
                'ranking' => $ranking
            ]);
            $ranking++;
        }

        return redirect()->route('admin.perhitungan_jalur_tes.index', [
            'tahun_ajaran' => $tahunAjaran
        ]);
    }

    // Preview
    public function preview()
    {
        $hasilSeleksiTes = HasilSeleksiTes::latest()->get();

        return view('cetak.hasil_seleksi_tes.print', [
            'hasilSeleksiTes' => $hasilSeleksiTes,
        ]);
    }

    // Print
    public function print(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => ['required', 'string']
        ]);

        $tahunAjaran = $request->input('tahun_ajaran');

        // Ambil data hasil seleksi berdasarkan tahun ajaran
        $hasilSeleksiTes = HasilSeleksiTes::with('siswa')
            ->whereHas('siswa', function ($query) use ($tahunAjaran) {
                $query->where('tahun_ajaran', $tahunAjaran);
            })->orderBy('ranking')->get();

        // Render blade sebagai HTML
        $html = view('cetak.hasil_seleksi_tes.print', [
            'hasilSeleksiTes'   => $hasilSeleksiTes,
            'tahunAjaran'       => $tahunAjaran,
        ])->render();

        // Buat PDF dengan Browsershot
        $pdf = Browsershot::html($html)
            ->format('A4')
            ->margins(10, 0, 10, 0)
            ->showBackground()
            ->landscape()
            ->pdf();

        return response($pdf)
            ->header('Content-Type', 'application/pdf');
    }
}
