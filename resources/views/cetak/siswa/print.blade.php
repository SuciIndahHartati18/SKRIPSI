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

        <span class="w-full border"></span>
        
        <div class="flex flex-col items-center">
            <span>Data Seleksi Siswa Baru</span>

            <table class="table-auto">
                <thead>
                    <tr>
                        <td class="font-bold text-center border border-grey-900 whitespace-wrap px-4 py-1">No.</td>
                        <td class="font-bold text-center border border-grey-900 whitespace-wrap px-4 py-1">Nisn</td>
                        <td class="font-bold text-center border border-grey-900 whitespace-wrap px-4 py-1">Nama</td>
                        <td class="font-bold text-center border border-grey-900 whitespace-wrap px-4 py-1">Alamat</td>
                        <td class="font-bold text-center border border-grey-900 whitespace-wrap px-4 py-1">Jalur</td>
                        <td class="font-bold text-center border border-grey-900 whitespace-wrap px-4 py-1">Keterangan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                        <tr>
                            <td class="text-center border border-grey-900 whitespace-wrap px-4 py-1">{{ $loop->iteration }}</td>
                            <td class="text-center border border-grey-900 whitespace-wrap px-4 py-1">{{ $siswa->nisn }}</td>
                            <td class="text-center border border-grey-900 whitespace-wrap px-4 py-1">{{ $siswa->nama_siswa }}</td>
                            <td class="text-center border border-grey-900 whitespace-wrap px-4 py-1">{{ $siswa->alamat }}</td>
                            <td class="text-center border border-grey-900 whitespace-wrap px-4 py-1">{{ $siswa->jalur }}</td>
                            <td class="text-center border border-grey-900 whitespace-wrap px-4 py-1"> - </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>`