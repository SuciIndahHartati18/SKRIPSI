<x-layout>
    <div class="bg-slate-200 shadow shadow-slate-500 px-4 py-4">
        <form action="{{ route('admin.nilai_prestasi.create') }}" method="GET">
            <x-form.container variant="label-input">
                <x-form.label for="siswa_id">Pilih Siswa:</x-form.label>
                <x-form.select name="siswa_id" id="siswa_id" onchange="this.form.submit()">
                    <option value="">-- Pilih --</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ $selectedSiswa == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nama_siswa }}
                        </option>
                    @endforeach
                </x-form.select>

                <span class="my-1"></span>
            </x-form.container>
        </form>

        <form method="POST" action="{{ route('admin.nilai_prestasi.store') }}">
            @csrf
            <div class="flex flex-col gap-3">
                <input type="hidden" name="siswa_id" value="{{ $selectedSiswa }}">

                <x-form.container variant="label-input">
                    <x-form.label for="kriteria_prestasi_id">Pilih Kriteria Prestasi</x-form.label>
                    <x-form.select name="kriteria_prestasi_id" id="kriteria_prestasi_id">
                        @forelse($kriteriaPrestasi as $kriteria)
                            <option value="{{ $kriteria->id }}">{{ $kriteria->nama_kriteria_prestasi }}</option>
                        @empty
                            <option disabled>Tidak ada kriteria untuk siswa ini/Pilih Siswa</option>
                        @endforelse
                    </x-form.select>
                </x-form.container>

                <x-form.container variant="label-input">
                    <x-form.label for="nilai_prestasi">Nilai Prestasi</x-form.label>
                    <x-form.input type="number" name="nilai_prestasi" id="nilai_prestasi" :value="old('nilai_prestasi')"
                        placeholder="00" />
                    <x-form.error errorFor="nilai_prestasi" />
                </x-form.container>

                <x-form.container variant="button">
                    <a href="{{ route('dashboard') }}"
                        class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
                    <button type="submit"
                        class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
                </x-form.container>
            </div>
        </form>
    </div>
</x-layout>