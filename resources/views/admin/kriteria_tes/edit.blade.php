<x-layout-dashboard>
    <x-slot:heading>
        Edit Data Kriteria Tes
    </x-slot:heading>

    <x-form.form action="{{ route('admin.kriteria_tes.update', $kriteriaTes) }}">
        @method('PUT')
        
        <x-form.container variant="label-input">
            <x-form.label for="nama_kriteria_tes">Nama Kriteria Tes</x-form.label>
            <x-form.select name="nama_kriteria_tes" id="nama_kriteria_tes">
                <option value="Mengaji" {{ old('nama_kriteria_tes', $kriteriaTes->nama_kriteria_tes) === 'Mengaji' ? 'selected' : '' }}>Mengaji</option>
                <option value="Wawancara" {{ old('nama_kriteria_tes', $kriteriaTes->nama_kriteria_tes) === 'Wawancara' ? 'selected' : '' }}>Wawancara</option>
                <option value="Psikotes" {{ old('nama_kriteria_tes', $kriteriaTes->nama_kriteria_tes) === 'Psikotes' ? 'selected' : '' }}>Psikotes</option>
            </x-form.select>
            <x-form.error errorFor="nama_kriteria_tes" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="tipe_kriteria_tes">Tipe Kriteria Tes</x-form.label>
            <x-form.select name="tipe_kriteria_tes" id="tipe_kriteria_tes">
                <option value="benefit" {{ old('tipe_kriteria_tes'), $kriteriaTes->tipe_kriteria_tes  === 'benefit' ? 'selected' : '' }}>Benefit</option>
                <option value="cost" {{ old('tipe_kriteria_tes', $kriteriaTes->tipe_kriteria_tes) === 'cost' ? 'selected' : '' }}>cost</option>
            </x-form.select>
            <x-form.error errorFor="tipe_kriteria_tes" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="bobot_kriteria_tes">Bobot Kriteria Tes</x-form.label>
            <x-form.input type="text" name="bobot_kriteria_tes" id="bobot_kriteria_tes" :value="old('bobot_kriteria_tes', $kriteriaTes->bobot_kriteria_tes)" data-format="decimal" placeholder="00.00" />
            <x-form.error errorFor="bobot_kriteria_tes" />
        </x-form.container>

        <x-form.container variant="button">
            <a href="{{ route('admin.kriteria_tes.index') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>

</x-layout-dashboard>