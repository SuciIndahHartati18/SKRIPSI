<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::latest()->simplePaginate(6);

        return view('admin.siswa.index', [
            'siswas' => $siswas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn'          => ['required'],
            'nama_siswa'    => ['required'],
            'alamat'        => ['required'],
            'jalur'         => ['required'],
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', [
            'siswa' => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nisn'          => ['required'],
            'nama_siswa'    => ['required'],
            'alamat'        => ['required'],
            'jalur'         => ['required'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
        ]);

        $siswa->update($validated);
        
        return redirect()->route('admin.siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
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

        return view('admin.siswa.index', [
            'siswas' => $siswas,
        ]);
    }
}
