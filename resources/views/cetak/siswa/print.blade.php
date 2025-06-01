<x-layout>
    <div class="bg-white h-screen flex flex-col justify-center items-center px-6 gap-3">
        <div class="w-full flex justify-between items-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo's" class="w-24 bg-cover bg-center">
            
            <div class="flex flex-col gap-3">
                <p class="font-bold text-center text-4xl">MTs.S Manhajussalam</p>
                <p class="text-center text-xl">Jl. Yani Km 98,5 Jorong Kec. Jorong, Kab. Tanah Laut</p>
            </div>

            <span></span>
        </div>

        <span class="w-full" style="border: 1px solid;"></span>
        
        <!-- tabel -->
        <div class="flex flex-col items-center">
            <span>Data Seleksi Siswa Baru</span>

            <table class="table-auto">
                <thead>
                    <tr>
                        <td class="times font-bold text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">No.</td>
                        <td class="times font-bold text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">Nisn</td>
                        <td class="times font-bold text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">Nama</td>
                        <td class="times font-bold text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">Alamat</td>
                        <td class="times font-bold text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">Jalur</td>
                        <td class="times font-bold text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">Keterangan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                        <tr>
                            <td class="text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">{{ $loop->iteration }}</td>
                            <td class="text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">{{ $siswa->nisn }}</td>
                            <td class="text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">{{ $siswa->nama_siswa }}</td>
                            <td class="text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">{{ $siswa->alamat }}</td>
                            <td class="text-center whitespace-wrap px-4 py-1" style="border: 1px solid;">{{ $siswa->jalur }}</td>
                            <td class="text-center whitespace-wrap px-4 py-1" style="border: 1px solid;"> - </td>
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
</x-layout>