<x-layout-dashboard>
    <x-slot:heading>
        Perhitungan SAW Jalur Prestasi
    </x-slot:heading>

    <!-- Nilai Prestasi -->
    <div class="flex flex-col">
        <x-table.container variant="heading">
            <span class="font-semibold text-rose-900 text-2xl">Nilai Keputusan Terbobot:</span>
            <x-table.link variant="create" href="{{ route('admin.nilai_prestasi.create') }}">+ Tambah</x-table.link>
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
                            <x-table.td variant="head">K4</x-table.td>
                            <x-table.td variant="head">K5</x-table.td>
                            <x-table.td variant="head">K6</x-table.td>
                        </x-table.tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <x-table.tr variant="body">
                                <x-table.td variant="body">{{ $loop->iteration }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->nama_siswa }}</x-table.td>

                                @php
                                    $nilaiMatematika= $siswa->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Matematika');
                                    $nilaiBahasa    = $siswa->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Bahasa Indonesia');
                                    $nilaiIPA       = $siswa->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Ilmu Pengetahuan Alam');
                                    $nilaiIPS       = $siswa->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Ilmu Pengetahuan Sosial');
                                    $nilaiPAI       = $siswa->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Pendidikan Agama Islam');
                                    $nilaiPKn       = $siswa->nilaiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Pendidikan Kewarnegaraan');
                                @endphp
                                <x-table.td variant="body">{{ $nilaiMatematika?->nilai_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiBahasa?->nilai_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiIPA?->nilai_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiIPS?->nilai_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiPAI?->nilai_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiPKn?->nilai_prestasi ?? '-' }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>
        </x-table.container>
    </div>

    <span class="my-3"></span>

    <!-- Normaliasi Prestasi -->
    <div class="flex flex-col">
        <x-table.container variant="heading">
            <span class="font-semibold text-rose-900 text-2xl">Nilai Normalisasi dengan Algoritma SAW:</span>
            <x-table.link variant="create" href="{{ route('admin.normalisasi_prestasi.create') }}">+ Tambah</x-table.link>
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
                            <x-table.td variant="head">K4</x-table.td>
                            <x-table.td variant="head">K5</x-table.td>
                            <x-table.td variant="head">K6</x-table.td>
                        </x-table.tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <x-table.tr variant="body">
                                <x-table.td variant="body">{{ $loop->iteration }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->nama_siswa }}</x-table.td>

                                @php
                                    $nilaiMatematika= $siswa->normalisasiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Matematika');
                                    $nilaiBahasa    = $siswa->normalisasiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Bahasa Indonesia');
                                    $nilaiIPA       = $siswa->normalisasiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Ilmu Pengetahuan Alam');
                                    $nilaiIPS       = $siswa->normalisasiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Ilmu Pengetahuan Sosial');
                                    $nilaiPAI       = $siswa->normalisasiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Pendidikan Agama Islam');
                                    $nilaiPKn       = $siswa->normalisasiPrestasi->firstWhere('kriteriaPrestasi.nama_kriteria_prestasi', 'Pendidikan Kewarnegaraan');
                                @endphp
                                <x-table.td variant="body">{{ $nilaiMatematika?->nilai_normalisasi_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiBahasa?->nilai_normalisasi_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiIPA?->nilai_normalisasi_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiIPS?->nilai_normalisasi_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiPAI?->nilai_normalisasi_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $nilaiPKn?->nilai_normalisasi_prestasi ?? '-' }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>
        </x-table.container>
    </div>

    <span class="my-3"></span>

    <div class="flex flex-col">
        <x-table.container variant="heading">
            <span class="font-semibold text-rose-900 text-2xl">Nilai Akhir Prestasi</span>

            <div class="flex gap-3">
                <x-table.link variant="create" href="{{ route('admin.hasil_seleksi_prestasi.create') }}">+ Tambah</x-table.link>
                <x-table.link variant="create" href="{{ route('admin.hasil_seleksi_prestasi.editRanking') }}">+ Ranking</x-table.link>
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
                                <x-table.td variant="body">{{ $siswa->hasilSeleksiPrestasi->nilai_akhir_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->hasilSeleksiPrestasi->status_prestasi ?? '-' }}</x-table.td>
                                <x-table.td variant="body">{{ $siswa->hasilSeleksiPrestasi->ranking ?? '-' }}</x-table.td>
                            </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-table.container>
        </x-table.container>

        <div class="my-3">
            <form method="GET" action="{{ route('admin.hasil_seleksi_prestasi.print') }}" target="_blank">
                <div class="flex justify-end gap-3">
                    <select name="tahun_ajaran" id="tahun_ajaran" class="text-lg px-4 py-1">
                        <option value="">Pilih Tahun</option>
                        @foreach ($tahunAjaran as $tahun)
                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                        @endforeach
                    </select>

                    <select name="status_prestasi" id="status_prestasi" class="text-lg px-4 py-1">
                        <option value="">Pilih Status</option>
                        <option value="Lulus" {{ request('status_prestasi') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        <option value="Tidak lulus" {{ request('status_prestasi') == 'Tidak lulus' ? 'selected' : '' }}>Tidak lulus</option>
                    </select>

                    <button type="submit" class="w-fit bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>