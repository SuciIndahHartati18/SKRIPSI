<x-layout-dashboard>
    <x-slot:heading>
        Hasil Seleksi Tes
    </x-slot:heading>

    <div class="bg-slate-200 flex flex-col px-4 py-4 gap-3 shadow shadow-slate-500">
        <form method="GET" action="{{ route('admin.hasil_seleksi_tes.create') }}">
            <x-form.container variant="label-input">
                <x-form.label for="siswa">Siswa</x-form.label>
                <x-form.select name="siswa_id" id="siswa_id" onchange="this.form.submit()">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}"
                            {{ request('siswa_id') == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nama_siswa }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.container>
        </form>

        @if ($selectedSiswa && count($normalisasiTes))
            <form method="POST" action="{{ route('admin.hasil_seleksi_tes.store') }}">
                @csrf
                <x-form.input type="hidden" name="siswa_id" value="{{ $selectedSiswa->id }}" />

                <div class="flex flex-col gap-3">
                    @foreach ($normalisasiTes as $normalisasi)
                        <x-form.container variant="label-input">
                            <x-form.label for="">{{ $normalisasi->kriteriates->nama_kriteria_tes }}</x-form.label>
                            <x-form.input type="text" name="" value="{{ $normalisasi->nilai_normalisasi_tes }}" />
                        </x-form.container>
                    @endforeach

                    <x-form.container variant="button">
                        <a href="{{ route('admin.perhitungan_jalur_tes.index') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
                        <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
                    </x-form.container>
                </div>
            </form>
        @endif
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded my-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</x-layout-dashboard>