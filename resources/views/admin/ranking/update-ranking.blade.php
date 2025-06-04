<x-layout-dashboard>
    <x-slot:heading>
        Ranking
    </x-slot:heading>

    <x-form.form action="{{ route('admin.ranking.updateRanking') }}">

    <div class="flex flex-col gap-3">
        <x-form.container variant="label-input">
            <x-form.label for="tahun_ajaran">Tahun Ajaran</x-form.label>
            <x-form.select name="tahun_ajaran" id="tahun_ajaran">
                <option value="">-- Pilih Tahun Ajaran --</option>
                @foreach ($tahunAjaran as $tahun)
                    <option value="{{ $tahun }}">
                        {{ $tahun }}
                    </option>
                @endforeach
            </x-form.select>
            <x-form.error errorFor="tahun_ajaran" />
        </x-form.container>

        <x-form.container variant="button">
            <a href="{{ route('admin.ranking.index') }}" class="inline-block bg-red-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-red-600">Batal</a>
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </div>
    </x-form.form>
</x-layout-dashboard>