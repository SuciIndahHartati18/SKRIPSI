<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    
    <div class="bg-white flex flex-col justify-between items-center px-6 gap-3" style="font-family: Times New Roman, Times, serif;">
        <div class="w-full flex flex-col gap-3">
            <div class="w-full flex justify-between items-center">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo's" class="w-24 bg-cover bg-center">
                
                <div class="flex flex-col gap-1">
                    <p class="font-bold text-center text-4xl">MTs.S Manhajussalam</p>
                    <p class="text-center text-xl">Jl. A Yani Km 98,5 Jorong Kec. Jorong, Kab. Tanah Laut</p>
                </div>
    
                <span></span>
            </div>
    
            <span class="w-full" style="border: 1px solid;"></span>
            
            <div class="flex flex-col">
                <span class="font-bold text-center text-2xl">Hasil Seleksi Jalur Tes ({{ strtoupper($statusTes ?? '-') }})</span>
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
                    @foreach($hasilSeleksiTes as $hasilSeleksi)
                        <tr class="h-[3rem] align-middle">
                            <td class="w-fit text-center px-4 py-1" style="border: 1px solid;">{{ $loop->iteration }}</td>
                            <td class="text-center px-4 py-1" style="border: 1px solid;">{{ $hasilSeleksi->siswa->nama_siswa }}</td>
                            <td class="text-center px-4 py-1" style="border: 1px solid;">{{ $hasilSeleksi->nilai_akhir_tes ?? '-' }}</td>
                            <td class="text-center px-4 py-1" style="border: 1px solid;">{{ $hasilSeleksi->ranking ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-full h-32 flex justify-end">
            <div class="w-1/6 flex flex-col justify-between">
                <div class="flex flex-col px-4">
                    <span>Jorong,</span>
                    <span>Kepala Sekolah</span>
                </div>

                <span class="w-full" style="border: 1px solid;"></span>
            </div>
        </div>
    </div>

</body>
</html>