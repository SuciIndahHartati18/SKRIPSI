<x-layout>

    <x-form.form action="{{ route('admin.hasil_seleksi_prestasi.store') }}">
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
            <x-form.label for="nilai_akhir_prestasi">Nilai Akhir Prestasi</x-form.label>
            <x-form.input type="text" name="nilai_akhir_prestasi" id="nilai_akhir_prestasi" :value="old('nilai_akhir_prestasi')" data-format="decimal" placeholder="00.00" />
            <x-form.error errorFor="nilai_akhir_prestasi" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="status_prestasi">Status Prestasi</x-form.label>
            <x-form.select name="status_prestasi" id="status_prestasi">
                <option value="Tidak ada" {{ old('status_prestasi') === 'Tidak ada' ? 'selected' : '' }}>Tidak ada</option>
                <option value="Ada" {{ old('status_prestasi') === 'Ada' ? 'selected' : '' }}>Ada</option>
            </x-form.select>
            <x-form.error errorFor="status_prestasi" />
        </x-form.container>

        <x-form.container variant="button">
            <a href="{{ route('dashboard') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>

</x-layout>