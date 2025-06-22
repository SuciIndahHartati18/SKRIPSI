<x-layout-print>

    <div class="flex flex-col">
        <span class="font-bold text-center text-2xl">Hasil Seleksi Jalur Prestasi ({{ strtoupper($statusPrestasi ?? '-') }})</span>
        <span class="font-bold text-center text-2xl">Tahun Ajaran {{ $tahunAjaran ?? 'Semua' }}</span>
    </div>

    <!-- tabel -->
    <table class="table-auto w-full">
        <thead>
            <tr>
                <td class="w-fit font-bold text-lg text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">No.</td>
                <td class="font-bold text-lg text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">Nama</td>
                <td class="font-bold text-lg text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">Total Nilai</td>
                <td class="font-bold text-lg text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">Ranking</td>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilSeleksiPrestasi as $hasilSeleksi)
                <tr class="h-[3rem] align-middle">
                    <td class="w-fit text-center px-4 py-1" style="border: 1px solid;">{{ $loop->iteration }}</td>
                    <td class="text-center px-4 py-1" style="border: 1px solid;">{{ $hasilSeleksi->siswa->nama_siswa }}</td>
                    <td class="text-center px-4 py-1" style="border: 1px solid;">{{ $hasilSeleksi->nilai_akhir_prestasi ?? '-' }}</td>
                    <td class="text-center px-4 py-1" style="border: 1px solid;">{{ $hasilSeleksi->ranking ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout-print>