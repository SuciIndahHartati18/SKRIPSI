<x-layout-dashboard>
    <x-slot:heading>
        DASHBOARD
    </x-slot:heading>
    
    <div class="bg-slate-200 flex flex-col shadow shadow-slate-500">
        <div class="overflow-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-slate-500">
                        <td class="font-semibold text-slate-700 text-lg text-center px-3 py-2 whitespace-nowrap">No.</td>
                        <td class="font-semibold text-slate-700 text-lg text-center px-3 py-2 whitespace-nowrap">NISN</td>
                        <td class="font-semibold text-slate-700 text-lg text-center px-3 py-2 whitespace-nowrap">Nama Siswa</td>
                        <td class="font-semibold text-slate-700 text-lg text-center px-3 py-2 whitespace-nowrap">Alamat Siswa</td>
                        <td class="font-semibold text-slate-700 text-lg text-center px-3 py-2 whitespace-nowrap">Jalur</td>
                        <td class="font-semibold text-slate-700 text-lg text-center px-3 py-2 whitespace-nowrap">Jenis Kelamin</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                        <tr class="odd:bg-slate-200 even:bg-slate-100">
                            <td class="text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $siswa->nisn }}</td>
                            <td class="text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $siswa->nama_siswa }}</td>
                            <td class="text-slate-700 text-md text-start px-3 py-2 whitespace-nowrap">{{ $siswa->alamat }}</td>
                            <td class="text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $siswa->jalur }}</td>
                            <td class="text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $siswa->jenis_kelamin }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-between p-3">
            <span class="w-full">{{ $siswas->withQueryString()->links() }}</span>
        </div>
    </div>
</x-layout-dashboard>