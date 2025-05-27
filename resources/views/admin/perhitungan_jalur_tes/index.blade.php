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
            <x-table.link variant="create" href="{{ route('admin.hasil_seleksi_tes.create') }}">+ Tambah</x-table.link>
        </x-table.container>
    
        <x-table.container variant="main">
            <x-table.container variant="table">
                <x-table.table>
                    <thead>
                        <x-table.tr variant="head">
                            <x-table.td variant="head">No.</x-table.td>
                            <x-table.td variant="head">Nama Perserta</x-table.td>
                            <x-table.td variant="head">Nilai Akhir</x-table.td>
                        </x-table.tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <x-table.tr variant="body">
                                <x-table.td variant="body">{{ $loop->iteration }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->nama_siswa }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->hasilSeleksiTes->first()?->nilai_akhir_tes ?? '-' }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>
        </x-table.container>
    </div>
</x-layout-dashboard>