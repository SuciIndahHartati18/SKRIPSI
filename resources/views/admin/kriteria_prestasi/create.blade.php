<x-layout-dashboard>
    <x-slot:heading>
        Kriteria Prestasi
    </x-slot:heading>

    <x-form.form action="{{ route('admin.kriteria_prestasi.store') }}">
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
            <x-form.label for="nama_kriteria_prestasi">Nama Kriteria Prestasi</x-form.label>
            <x-form.select name="nama_kriteria_prestasi" id="nama_kriteria_prestasi">
                <option value="Matematika" {{ old('nama_kriteria_tes') === 'Matematika' ? 'selected' : '' }}>Matematika</option>
                <option value="Bahasa Indonesia" {{ old('nama_kriteria_tes') === 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                <option value="Ilmu Pengetahuan Alam" {{ old('nama_kriteria_tes') === 'Ilmu Pengetahuan Alam' ? 'selected' : '' }}>Ilmu Pengetahuan Alam</option>
                <option value="Ilmu Pengetahuan Sosial" {{ old('nama_kriteria_tes') === 'Ilmu Pengetahuan Sosial' ? 'selected' : '' }}>Ilmu Pengetahuan Sosial</option>
                <option value="Pendidikan Agama Islam" {{ old('nama_kriteria_tes') === 'Pendidikan Agama Islam' ? 'selected' : '' }}>Pendidikan Agama Islam</option>
                <option value="Pendidikan Kewarnegaraan" {{ old('nama_kriteria_tes') === 'Pendidikan Kewarnegaraan' ? 'selected' : '' }}>Pendidikan Kewarnegaraan</option>
            </x-form.select>
            <x-form.error errorFor="nama_kriteria_prestasi" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="tipe_kriteria_prestasi">Tipe Kriteria Prestasi</x-form.label>
            <x-form.select name="tipe_kriteria_prestasi" id="tipe_kriteria_prestasi">
                <option value="Tidak ada" {{ old('tipe_kriteria_prestasi') === 'Tidak ada' ? 'selected' : '' }}>Tidak ada</option>
                <option value="Ada" {{ old('tipe_kriteria_prestasi') === 'Ada' ? 'selected' : '' }}>Ada</option>
            </x-form.select>
            <x-form.error errorFor="tipe_kriteria_prestasi" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="bobot_kriteria_prestasi">Bobot Kriteria Prestasi</x-form.label>
            <x-form.input type="text" name="bobot_kriteria_prestasi" id="bobot_kriteria_prestasi" :value="old('bobot_kriteria_prestasi')" data-format="decimal" placeholder="00.00" />
            <x-form.error errorFor="bobot_kriteria_prestasi" />
        </x-form.container>

        <x-form.container variant="button">
            <a href="{{ route('dashboard') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>

</x-layout-dashboard>