<x-layout-dashboard>
    <x-slot:heading>
        EDIT SISWA
    </x-slot:heading>

    <x-form.form action="{{ route('admin.siswa.update', $siswa) }}">
        @method('PUT')

        <x-form.container variant="label-input">
            <x-form.label for="nisn">NISN</x-form.label>
            <x-form.input type="text" name="nisn" id="nisn" :value="old('nisn', $siswa->nisn)" placeholder="NISN..." />
            <x-form.error errorFor="nisn" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="nama_siswa">Nama Siswa</x-form.label>
            <x-form.input type="text" name="nama_siswa" id="nama_siswa" :value="old('nama_siswa', $siswa->nama_siswa)" placeholder="Nama siswa..."/>
            <x-form.error errorFor="nama_siswa" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="tahun_ajaran">Nama Siswa</x-form.label>
            <x-form.input type="text" name="tahun_ajaran" id="tahun_ajaran" :value="old('tahun_ajaran', $siswa->tahun_ajaran)" placeholder="20XX"/>
            <x-form.error errorFor="tahun_ajaran" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="alamat">Alamat</x-form.label>
            <x-form.textarea name="alamat" id="alamat" placeholder="Alamat">
                {{ old('alamat', $siswa->alamat) }}
            </x-form.textarea>
            <x-form.error errorFor="alamat" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="jenis_kelamin">Jenis Kelamin</x-form.label>
            <x-form.select name="jenis_kelamin" id="jenis_kelamin">
                <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </x-form.select>
            <x-form.error errorFor="jenis_kelamin" />
        </x-form.container>

        <x-form.container variant="button">
            <a href="{{ route('admin.siswa.index') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>

</x-layout-dashboard>