<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilSeleksiPrestasi;
use App\Models\Ranking;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaran = $request->input('tahun_ajaran');

        $tahunAjaranList = Siswa::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        $rankings = Ranking::with('siswa')
            ->whereHas('siswa', function ($query) use ($tahunAjaran) {
                $query->where('tahun_ajaran', $tahunAjaran);
            })
            ->orderBy('ranking')
            ->get();

        return view('admin.ranking.index', compact('rankings', 'tahunAjaranList', 'tahunAjaran'));

        /*
        $rankings = Ranking::latest()->get();

        return view('admin.ranking.index', [
            'rankings' => $rankings,
        ]);
        */
    }

    public function create(Request $request)
    {
        $siswas = Siswa::whereHas('hasilSeleksiPrestasi')->whereHas('hasilSeleksiTes')->get();

        // Ambil siswa terpilih
        $siswaTerpilih = null;
        $nilaiAkhirPrestasi = null;
        $nilaiAkhirTes = null;

        if ($request->filled('siswa_id')) {
            $siswaTerpilih = Siswa::find($request->siswa_id);

            if ($siswaTerpilih) {
                $nilaiAkhirPrestasi = $siswaTerpilih->hasilSeleksiPrestasi->first()?->nilai_akhir_prestasi;
                $nilaiAkhirTes = $siswaTerpilih->hasilSeleksiTes->first()?->nilai_akhir_tes;
            }
        }

        return view('admin.ranking.create', [
            'siswas'            => $siswas,
            'siswaTerpilih'     => $siswaTerpilih,
            'nilaiAkhirTes'     => $nilaiAkhirTes,
            'nilaiAkhirPrestasi'=> $nilaiAkhirPrestasi,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'              => ['required', 'exists:siswa,id'],
            'nilai_akhir_prestasi'  => ['required', 'numeric'],
            'nilai_akhir_tes'       => ['required', 'numeric'],
        ]);

        // Ambil nilai input
        $nilaiPrestasi  = $request->input('nilai_akhir_prestasi');
        $nilaiTes       = $request->input('nilai_akhir_tes');

        // Hitung nilai akhir dengan bobot
        $nilaiAkhir = ($nilaiPrestasi * 0.60) + ($nilaiTes * 0.40);

        // Simpan ke tabel ranking
        Ranking::create([
            'siswa_id'      => $request->siswa_id,
            'nilai_akhir'   => $nilaiAkhir,
            'ranking'       => '-', // Bisa diisi nanti saat proses perankingan
        ]);

        return redirect()->route('admin.ranking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function show(Ranking $ranking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function edit(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ranking $ranking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ranking $ranking)
    {
        //
    }

    // Update Ranking
    public function showUpdateForm()
    {
        $tahunAjaran = Siswa::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        return view('admin.ranking.update-ranking', [
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function updateRanking(Request $request)
    {
        $tahunAjaran = $request->input('tahun_ajaran');

        if (!$tahunAjaran) {
            return redirect()->back()->with('error', 'Tahun ajaran harus dipilih.');
        }

        // Ambil ranking yang berkaitan dengan siswa yang memiliki tahun ajaran yang sama
        $rankings = Ranking::whereHas('siswa', function ($query) use ($tahunAjaran) {
            $query->where('tahun_ajaran', $tahunAjaran);
        })
        ->with('siswa') // optional, untuk menghindari lazy loading
        ->orderByDesc('nilai_akhir')
        ->get();

        foreach ($rankings as $index => $ranking) {
            $ranking->update([
                'ranking' => $index + 1
            ]);
        }

        return redirect()->route('admin.ranking.index');
    }

    // Filter
    public function filterByTahunAjaran(Request $request)
    {
        $tahunAjaran = $request->input('tahun_ajaran');

        $tahunAjaranList = Siswa::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        $rankings = Ranking::with('siswa')
            ->whereHas('siswa', function ($query) use ($tahunAjaran) {
                $query->where('tahun_ajaran', $tahunAjaran);
            })
            ->orderBy('ranking')
            ->get();

        return view('admin.ranking.index', compact('rankings', 'tahunAjaranList', 'tahunAjaran'));
    }
}
