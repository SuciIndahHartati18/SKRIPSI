<x-layout-dashboard>
    <x-slot:heading>
        Nilai Prestasi
    </x-slot:heading>

    <x-form.form action="{{ route('admin.nilai_prestasi.store') }}">
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

        @foreach ($kriteriaPrestasi as $index => $kriteria)
            <x-form.container variant="label-input">
                <x-form.label for="nilai_prestasi_{{ $index }}">{{ $kriteria->nama_kriteria_prestasi }}</x-form.label>
                <x-form.input type="hidden" name="kriteria_prestasi_id[]" :value="$kriteria->id" />

                <x-form.input type="number" name="nilai_prestasi[]" id="nilai_prestasi_{{ $index }}" :value="old('nilai_prestasi.' . $index)" placeholder="0" min="0" max="100" />
            </x-form.container>
        @endforeach

        <x-form.container variant="button">
            <a href="{{ route('admin.perhitungan_jalur_prestasi.index') }}"
                class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit"
                class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>

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