<x-layout>

    <x-form.form action="{{ route('admin.nilai_tes.store') }}">
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
            <x-form.label for="kriteria_tes">Kriteria Tes</x-form.label>
            <x-form.select name="kriteria_tes_id" id="kriteria_tes_id">
                <option value="">Pilih Kriteria Tes</option>
                @foreach ($kriteriaTes as $kriteria)
                    <option value="{{ $kriteria->id }}"
                        {{ old('kriteria_tes_id') === $kriteria->id ? 'selected' : '' }}>
                        {{ $kriteria->siswa->nama_siswa }}, {{ $kriteria->nama_kriteria_tes }}
                    </option>
                @endforeach
            </x-form.select>
            <x-form.error errorFor="kriteria_tes_id" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="nilai_tes">Nilai Tes</x-form.label>
            <x-form.input type="number" name="nilai_tes" id="nilai_tes" :value="old('nilai_tes')" placeholder="00" />
            <x-form.error errorFor="nilai_tes" />
        </x-form.container>

        <x-form.container variant="button">
            <a href="{{ route('dashboard') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>

</x-layout>