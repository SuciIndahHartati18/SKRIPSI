<x-layout-dashboard>
    <x-slot:heading>
        Ranking
    </x-slot:heading>

    <div class="bg-slate-200 flex flex-col px-4 py-4 gap-3 shadow shadow-slate-500">
        <form method="GET" action="{{ route('admin.hasil_seleksi_prestasi.editRanking') }}">
            <x-form.container variant="label-input">
                <x-form.label for="tahun_ajaran">Tahun Ajaran</x-form.label>
                
                <x-form.select name="tahun_ajaran" id="tahun_ajaran" onchange="this.form.submit()">
                    <option value="">Pilih Tahun Ajaran</option>
                    @foreach ($tahunAjaran as $tahun)
                        <option value="{{ $tahun }}" {{ $tahunDipilih == $tahun ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>
                    @endforeach
                </x-form.select>
            </x-form.container>
        </form>

        @if ($hasilSeleksiPrestasi->count())
            <form method="POST" action="{{ route('admin.hasil_seleksi_prestasi.updateRanking') }}">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-3">
                    <input type="hidden" name="tahun_ajaran" value="{{ $tahunDipilih }}">

                    <table>
                        <thead>
                            <tr class="bg-rose-900">
                                <th class="border border-slate-500 text-slate-100 px-3 py-1">Nama Siswa</th>
                                <th class="border border-slate-500 text-slate-100 px-3 py-1 whitespace-nowrap">Tahun Ajaran</th>
                                <th class="border border-slate-500 text-slate-100 px-3 py-1 whitespace-nowrap">Nilai Akhir Prestasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasilSeleksiPrestasi as $item)
                                <tr>
                                    <td class="border border-slate-500 px-3 py-1">{{ $item->siswa->nama_siswa }}</td>
                                    <td class="border border-slate-500 text-center px-3 py-1 whitespace-nowrap">{{ $item->siswa->tahun_ajaran }}</td>
                                    <td class="border border-slate-500 text-center px-3 py-1 whitespace-nowrap">{{ $item->nilai_akhir_prestasi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex gap-2 justify-end">
                        <a href="{{ route('admin.perhitungan_jalur_prestasi.index') }}" type="submit" class="inline-block bg-red-500 hover:bg-red-700 font-bold text-slate-100 text-center px-4 py-1 rounded rounded-sm">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold text-slate-100 text-center px-4 py-1 rounded rounded-sm">
                            Buat Ranking
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</x-layout-dashboard>