<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaran    = $request->input('tahun_ajaran');
        $query          = Siswa::query();

        if ($tahunAjaran) {
            $query->where('tahun_ajaran', $tahunAjaran);
        }
        
        $siswas         = $query->latest()->simplePaginate(6);
        $tahunAjarans   = Siswa::select('tahun_ajaran')->distinct()->orderBy('tahun_ajaran', 'desc')->pluck('tahun_ajaran');

        return view('admin.siswa.index', [
            'siswas'        => $siswas,
            'tahunAjarans'  => $tahunAjarans,
        ]);
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn'          => ['required'],
            'nama_siswa'    => ['required'],
            'tahun_ajaran'  => ['required'],
            'alamat'        => ['required'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
        ]);

        Siswa::create($validated);
        
        return redirect()->route('admin.siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', [
            'siswa' => $siswa,
        ]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nisn'          => ['required'],
            'nama_siswa'    => ['required'],
            'tahun_ajaran'  => ['required'],
            'alamat'        => ['required'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
        ]);

        $siswa->update($validated);
        
        return redirect()->route('admin.siswa.index');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
         return redirect()->route('admin.siswa.index');
    }

    // Search
    public function search(Request $request)
    {
        $search = $request->input('search');

        $siswas = Siswa::when($search, function ($query, $search) {
                return $query->where('nama_siswa', 'like', '%' . $search . '%');
        })->simplePaginate(6);
        $tahunAjarans = Siswa::select('tahun_ajaran')->distinct()->orderBy('tahun_ajaran', 'desc')->pluck('tahun_ajaran');


        return view('admin.siswa.index', [
            'siswas'        => $siswas,
            'tahunAjarans'  => $tahunAjarans,
        ]);
    }
}
