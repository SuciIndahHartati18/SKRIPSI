<x-layout-dashboard>
    <x-slot:heading>
        Perhitungan SAW Jalur Tes
    </x-slot:heading>

    <!-- Nilai Tes -->
    <div class="flex flex-col">
        <x-table.container variant="heading">
            <span class="font-semibold text-rose-900 text-2xl">Nilai Keputusan Terbobot:</span>
            <x-table.link variant="create" href="{{ route('admin.nilai_tes.create') }}">+ Tambah</x-table.link>
        </x-table.container>
    
        <x-table.container variant="main">
            <x-table.container variant="table">
                <x-table.table>
                    <thead>
                        <x-table.tr variant="head">
                            <x-table.td variant="head">No.</x-table.td>
                            <x-table.td variant="head">Nama Perserta</x-table.td>
                            <x-table.td variant="head">K1</x-table.td>
                            <x-table.td variant="head">K2</x-table.td>
                            <x-table.td variant="head">K3</x-table.td>
                        </x-table.tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <x-table.tr variant="body">
                                <x-table.td variant="body">{{ $loop->iteration }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->nama_siswa }}</x-table.td>
                                @php
                                    $nilaiMengaji   = $siswa->nilaiTes->firstWhere('kriteriaTes.nama_kriteria_tes', 'Mengaji');
                                    $nilaiWawancara = $siswa->nilaiTes->firstWhere('kriteriaTes.nama_kriteria_tes', 'Wawancara');
                                    $nilaiPsikotes  = $siswa->nilaiTes->firstWhere('kriteriaTes.nama_kriteria_tes', 'Psikotes');
                                @endphp
                                <x-table.td variant="body">{{ $nilaiMengaji?->nilai_tes ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiWawancara?->nilai_tes ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiPsikotes?->nilai_tes ?? '-' }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>
        </x-table.container>
    </div>

    <span class="my-3"></span>

    <!-- Normaliasi Tes -->
    <div class="flex flex-col">
        <x-table.container variant="heading">
            <span class="font-semibold text-rose-900 text-2xl">Nilai Normalisasi dengan Algoritma SAW:</span>
            <x-table.link variant="create" href="{{ route('admin.normalisasi_tes.create') }}">+ Tambah</x-table.link>
        </x-table.container>
    
        <x-table.container variant="main">
            <x-table.container variant="table">
                <x-table.table>
                    <thead>
                        <x-table.tr variant="head">
                            <x-table.td variant="head">No.</x-table.td>
                            <x-table.td variant="head">Nama Perserta</x-table.td>
                            <x-table.td variant="head">K1</x-table.td>
                            <x-table.td variant="head">K2</x-table.td>
                            <x-table.td variant="head">K3</x-table.td>
                        </x-table.tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <x-table.tr variant="body">
                                <x-table.td variant="body">{{ $loop->iteration }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->nama_siswa }}</x-table.td>

                                @php
                                    $nilaiMengaji   = $siswa->normalisasiTes->firstWhere('kriteriaTes.nama_kriteria_tes', 'Mengaji');
                                    $nilaiWawancara = $siswa->normalisasiTes->firstWhere('kriteriaTes.nama_kriteria_tes', 'Wawancara');
                                    $nilaiPsikotes  = $siswa->normalisasiTes->firstWhere('kriteriaTes.nama_kriteria_tes', 'Psikotes');
                                @endphp
                                <x-table.td variant="body">{{ $nilaiMengaji?->nilai_normalisasi_tes ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiWawancara?->nilai_normalisasi_tes ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiPsikotes?->nilai_normalisasi_tes ?? '-' }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>
        </x-table.container>
    </div>

    <span class="my-3"></span>

    <!-- Normaliasi Tes -->
    <div class="flex flex-col">
        <x-table.container variant="heading">
            <span class="font-semibold text-rose-900 text-2xl">Nilai Normalisasi dengan Algoritma SAW:</span>

            <div class="flex gap-3">
                <x-table.link variant="create" href="{{ route('admin.hasil_seleksi_tes.create') }}">+ Tambah</x-table.link>
                <x-table.link variant="create" href="{{ route('admin.hasil_seleksi_tes.editRanking') }}">+ Ranking</x-table.link>
            </div>
        </x-table.container>
    
        <x-table.container variant="main">
            <x-table.container variant="table">
                <x-table.table>
                    <thead>
                        <x-table.tr variant="head">
                            <x-table.td variant="head">No.</x-table.td>
                            <x-table.td variant="head">Nama Perserta</x-table.td>
                            <x-table.td variant="head">Total Nilai</x-table.td>
                            <x-table.td variant="head">Status</x-table.td>
                            <x-table.td variant="head">Ranking</x-table.td>
                        </x-table.tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <x-table.tr variant="body">
                                <x-table.td variant="body">{{ $loop->iteration }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->nama_siswa }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->hasilSeleksiTes->first()?->nilai_akhir_tes ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->hasilSeleksiTes->first()?->status_tes ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->hasilSeleksiTes->first()?->ranking ?? '-' }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>
        </x-table.container>

        <div class="my-3">
            <form method="GET" action="{{ route('admin.hasil_seleksi_tes.print') }}" target="_blank">
                <div class="flex justify-end gap-3">
                    <select name="tahun_ajaran" id="tahun_ajaran" class="text-lg px-4 py-1">
                        <option value="">Pilih Tahun</option>
                        @foreach ($tahunAjaran as $tahun)
                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                        @endforeach
                    </select>

                    <select name="status_tes" id="status_tes" class="text-lg px-4 py-1">
                        <option value="">Pilih Status</option>
                        <option value="Lulus" {{ request('status_tes') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="Tidak lulus" {{ request('status_tes') == 'Tidak lulus' ? 'selected' : '' }}>Tidak lulus</option>
                    </select>

                    <button type="submit" class="w-fit bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>