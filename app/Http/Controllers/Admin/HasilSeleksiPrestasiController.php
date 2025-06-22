<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksiPrestasi;
use App\Models\NormalisasiPrestasi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class HasilSeleksiPrestasiController extends Controller
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
        $siswas = Siswa::has('normalisasiPrestasi')->latest()->get();

        $selectedSiswa      = null;
        $normalisasiPrestasi= [];

        if ($request->filled('siswa_id')) {
            $selectedSiswa = Siswa::find($request->siswa_id);

            if ($selectedSiswa) {
                $normalisasiPrestasi = NormalisasiPrestasi::with('kriteriaPrestasi')
                    ->where('siswa_id', $selectedSiswa->id)->get();
            }
        }

        return view('admin.hasil_seleksi_prestasi.create', [
            'siswas'                => $siswas,
            'selectedSiswa'         => $selectedSiswa,
            'normalisasiPrestasi'   => $normalisasiPrestasi,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => ['required', 'exists:siswa,id'],
        ]);

        // Cek apakah siswa dengan nama dan tahun ajaran yang sama sudah ada
        $siswa          = Siswa::findOrFail($request->siswa_id);
        $alreadyExists  = HasilSeleksiPrestasi::whereHas('siswa', function ($query) use ($siswa) {
            $query->where('nama_siswa', $siswa->nama_siswa)
                ->where('tahun_ajaran', $siswa->tahun_ajaran);
        })->exists();

        if ($alreadyExists) {
            return back()->withErrors([
                'siswa_id' => 'Siswa dengan Nama dan Tahun Ajaran ini sudah memiliki "Hasil Seleksi Prestasi"!'
            ])->withInput();
        }

        $normalisasiPrestasi = NormalisasiPrestasi::with('kriteriaPrestasi')
            ->where('siswa_id', $request->siswa_id)->get();

        // Hitung nilai akhir dengan metode SAW
        $nilaiAkhir = 0;
        foreach ($normalisasiPrestasi as $normalisasi) {
            $nilai      = $normalisasi->nilai_normalisasi_prestasi;
            $bobot      = $normalisasi->kriteriaPrestasi->bobot_kriteria_prestasi;
            $nilaiAkhir += $nilai * $bobot;
        }

        // Tentukan status kelulusan berdasarkan nilai akhir
        if ($nilaiAkhir >= 0.70 && $nilaiAkhir <= 1.00) {
            $statusPrestasi = 'Lulus';
        } elseif ($nilaiAkhir >= 0.00 && $nilaiAkhir < 0.70) {
            $statusPrestasi = 'Tidak lulus';
        } else {
            $statusPrestasi = 'Nilai Tidak Valid';
        }

        HasilSeleksiPrestasi::updateOrCreate([
            'siswa_id' => $request->siswa_id,
        ], [
            'nilai_akhir_prestasi' => $nilaiAkhir,
            'ranking'              => '-', // Bisa diisi nanti
            'status_prestasi'      => $statusPrestasi,
        ]);

        return redirect()->route('admin.perhitungan_jalur_prestasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function show(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilSeleksiPrestasi  $hasilSeleksiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilSeleksiPrestasi $hasilSeleksiPrestasi)
    {
        //
    }

    public function editRanking(Request $request)
    {
        $tahunAjaran = Siswa::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        // Tahun ajaran yang dipilih dari filter
        $tahunDipilih = $request->input('tahun_ajaran');

        // Data hasil seleksi (kosong jika belum memilih tahun)
        $hasilSeleksiPrestasi = collect();

        // Jika user memilih tahun, ambil hasil seleksi berdasarkan siswa yang punya tahun ajaran itu
        if ($tahunDipilih) {
            $hasilSeleksiPrestasi = HasilSeleksiPrestasi::with('siswa')
                ->whereHas('siswa', function ($query) use ($tahunDipilih) {
                    $query->where('tahun_ajaran', $tahunDipilih);
                })->orderByDesc('nilai_akhir_prestasi')->get();
        }

        return view('admin.hasil_seleksi_prestasi.edit-ranking', [
            'tahunAjaran'           => $tahunAjaran,
            'tahunDipilih'          => $tahunDipilih,
            'hasilSeleksiPrestasi'  => $hasilSeleksiPrestasi,
        ]);
    }

    public function updateRanking(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => ['required', 'string']
        ]);

        $tahunAjaran = $request->input('tahun_ajaran');

        // Ambil semua hasil seleksi pretasi yang terhubung dengan siswa tahun ajaran yang dipilih
        $hasilSeleksiPrestasi = HasilSeleksiPrestasi::with('siswa')
            ->whereHas('siswa', function ($query) use ($tahunAjaran) {
                $query->where('tahun_ajaran', $tahunAjaran);
            })->orderByDesc('nilai_akhir_prestasi')->get();

        // Proses pemberian ranking otomatis
        $ranking = 1;
        foreach ($hasilSeleksiPrestasi as $item) {
            $item->update([
                'ranking' => $ranking
            ]);
            $ranking++;
        }

        return redirect()->route('admin.perhitungan_jalur_prestasi.index', [
            'tahun_ajaran' => $tahunAjaran
        ]);
    }

    // Preview
    public function preview()
    {
        $hasilSeleksiPrestasi = HasilSeleksiPrestasi::latest()->get();

        return view('cetak.hasil_seleksi_prestasi.print', [
            'hasilSeleksiPrestasi' => $hasilSeleksiPrestasi,
        ]);
    }

    // Print
    public function print(Request $request)
    {
        // Validasi: kedua input wajib diisi
        $request->validate([
            'tahun_ajaran'     => ['required', 'string'],
            'status_prestasi'  => ['required', 'in:Lulus,Tidak lulus'],
        ], [
            'tahun_ajaran.required'     => 'Tahun ajaran wajib dipilih.',
            'status_prestasi.required'  => 'Status prestasi wajib dipilih.',
            'status_prestasi.in'        => 'Status prestasi tidak valid.',
        ]);

        $tahunAjaran     = $request->input('tahun_ajaran');
        $statusPrestasi  = $request->input('status_prestasi');

        // Ambil data hasil seleksi berdasarkan filter tahun dan status
        $hasilSeleksiPrestasi = HasilSeleksiPrestasi::with('siswa')
            ->where('status_prestasi', $statusPrestasi)
            ->whereHas('siswa', function ($query) use ($tahunAjaran) {
                $query->where('tahun_ajaran', $tahunAjaran);
            })->orderBy('ranking')->get();

        $html = view('cetak.hasil_seleksi_prestasi.print', [
            'hasilSeleksiPrestasi' => $hasilSeleksiPrestasi,
            'tahunAjaran'          => $tahunAjaran,
            'statusPrestasi'       => $statusPrestasi,
        ])->render();

        $filePath = public_path('hasil_seleksi_prestasi.pdf');

        Browsershot::html($html)
            ->format('A4')
            ->margins(10, 0, 10, 0)
            ->showBackground()
            ->landscape()
            ->noSandbox()
            ->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

}
