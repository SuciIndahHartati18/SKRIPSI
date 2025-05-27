<x-layout-dashboard>
    <x-slot:heading>
        Nilai Tes
    </x-slot:heading>

    <x-form.form action="{{ route('admin.nilai_tes.store') }}">
        <x-form.container variant="label-input">
            <x-form.label for="siswa">Siswa</x-form.label>
            <x-form.select name="siswa_id" id="siswa_id">
                <option value="">Pilih Siswa</option>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}"
                        {{ (string) old('siswa_id') === (string) $siswa->id ? 'selected' : '' }}>
                        {{ $siswa->nama_siswa }}
                    </option>
                @endforeach
            </x-form.select>
        </x-form.container>

        @foreach ($kriteriaTes as $kriteria)
            <x-form.container variant="label-input">
                <x-form.label for="{{ $kriteria->nama_kriteria_tes }}" >{{ $kriteria->nama_kriteria_tes }}</x-form.label>
                <x-form.input type="hidden" name="kriteria_tes_id[]" id="kriteria_tes_id" :value="old('kriteria_tes_id', $kriteria->id)" placeholder="0"/>
    
                <x-form.input type="text" name="nilai_tes[]" id="nilai_tes" :value="old('nilai_tes')" placeholder="0" />
            </x-form.container>
        @endforeach

        <x-form.container variant="button">
            <a href="{{ route('admin.perhitungan_jalur_tes.index') }}"
                class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit"
                class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>
</x-layout-dashboard>