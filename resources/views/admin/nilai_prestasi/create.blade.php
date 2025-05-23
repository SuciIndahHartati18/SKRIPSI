<x-layout>

    <x-form.form action="{{ route('admin.nilai_prestasi.store') }}">
        <x-form.container variant="label-input">
            <x-form.label for="siswa">Siswa</x-form.label>
            <x-form.select name="siswa_id" id="siswa_id">
                <option value="">Pilih Siswa</option>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}"
                        {{ old('siswa_id') === $siswa->id ? 'selected' : '' }}>
                        {{ $siswa->nama_siswa }}
                    </option>
                @endforeach
            </x-form.select>
            <x-form.error errorFor="siswa_id" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="kriteria_prestasi">Kriteria Prestasi</x-form.label>
            <x-form.select name="kriteria_prestasi_id" id="kriteria_prestasi_id">
                <option value="">Pilih Kriteria Prestasi</option>
                @foreach ($kriteriaPrestasi as $kriteria)
                    <option value="{{ $kriteria->id }}"
                        {{ old('kriteria_prestasi_id') === $kriteria->id ? 'selected' : '' }}>
                        {{ $kriteria->siswa->nama_siswa }}, {{ $kriteria->nama_kriteria_prestasi }}
                    </option>
                @endforeach
            </x-form.select>
            <x-form.error errorFor="kriteria_prestasi_id" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="nilai_prestasi">Nilai Prestasi</x-form.label>
            <x-form.input type="number" name="nilai_prestasi" id="nilai_prestasi" :value="old('nilai_prestasi')" placeholder="00" />
            <x-form.error errorFor="nilai_prestasi" />
        </x-form.container>

        <x-form.container variant="button">
            <a href="{{ route('dashboard') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>

</x-layout>