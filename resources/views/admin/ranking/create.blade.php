<x-layout-dashboard>
    <x-slot:heading>
        Ranking
    </x-slot:heading>

    <div class="bg-slate-200 flex flex-col px-4 py-4 gap-3 shadow shadow-slate-500">
        <form method="GET" action="{{ route('admin.ranking.create') }}">
            
            <x-form.container variant="label-input">
                <x-form.label for="siswa_id">Siswa</x-form.label>
                <x-form.select name="siswa_id" id="siswa_id" onchange="this.form.submit()">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}"
                            {{ request('siswa_id') == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nama_siswa }}
                        </option>
                    @endforeach
                </x-form.select>
                <x-form.error errorFor="siswa_id" />
            </x-form.container>

        </form>

        @if (request('siswa_id'))
            <form method="POST" action="{{ route('admin.ranking.store') }}">
                @csrf
        
                <div class="flex flex-col gap-3">
                    <input type="hidden" name="siswa_id" value="{{ $siswaTerpilih->id }}">
                    
                    <x-form.container variant="label-input">
                        <x-form.label for="nilai_akhir_prestasi">Nilai Akhir Prestasi</x-form.label>
                        <x-form.input name="nilai_akhir_prestasi" id="nilai_akhir_prestasi" :value="$nilaiAkhirPrestasi ?? old('nilai_akhir_prestasi')" required />
                        <x-form.error errorFor="nilai_akhir_prestasi" />
                    </x-form.container>
            
                    <x-form.container variant="label-input">
                        <x-form.label for="nilai_akhir_tes">Nilai Akhir Tes</x-form.label>
                        <x-form.input name="nilai_akhir_tes" id="nilai_akhir_tes" :value="$nilaiAkhirTes ?? old('nilai_akhir_tes')" required />
                        <x-form.error errorFor="nilai_akhir_tes" />
                    </x-form.container>
            
                    <x-form.container variant="button">
                        <a href="{{ route('admin.ranking.index') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
                        <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
                    </x-form.container>
                </div>
            </form>
        @endif
    </div>

</x-layout-dashboard>