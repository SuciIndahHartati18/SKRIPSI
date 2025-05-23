<x-layout>

    <x-form.form action="{{ route('admin.kriteria_tes.store') }}">
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
            <x-form.label for="nama_kriteria_tes">Nama Kriteria Tes</x-form.label>
            <x-form.select name="nama_kriteria_tes" id="nama_kriteria_tes">
                <option value="akademik" {{ old('nama_kriteria_tes') === 'akademik' ? 'selected' : '' }}>Akademik</option>
                <option value="non akademic" {{ old('nama_kriteria_tes') === 'non akademic' ? 'selected' : '' }}>Non akademic</option>
            </x-form.select>
            <x-form.error errorFor="nama_kriteria_tes" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="tipe_kriteria_tes">Tipe Kriteria Tes</x-form.label>
            <x-form.select name="tipe_kriteria_tes" id="tipe_kriteria_tes">
                <option value="Tidak ada" {{ old('tipe_kriteria_tes') === 'Tidak ada' ? 'selected' : '' }}>Tidak ada</option>
                <option value="Ada" {{ old('tipe_kriteria_tes') === 'Ada' ? 'selected' : '' }}>Ada</option>
            </x-form.select>
            <x-form.error errorFor="tipe_kriteria_tes" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="bobot_kriteria_tes">Bobot Kriteria Tes</x-form.label>
            <x-form.input type="text" name="bobot_kriteria_tes" id="bobot_kriteria_tes" :value="old('bobot_kriteria_tes')" data-format="decimal" placeholder="00.00" />
            <x-form.error errorFor="bobot_kriteria_tes" />
        </x-form.container>

        <x-form.container variant="button">
            <a href="{{ route('dashboard') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>

</x-layout>