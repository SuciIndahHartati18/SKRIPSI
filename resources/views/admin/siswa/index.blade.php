<x-layout-dashboard>
    <x-slot:heading>
        SISWA
    </x-slot:heading>
    
    <div class="flex flex-col gap-3">
        <div class="bg-slate-100 flex justify-between">
            <div class="flex gap-3">
                <a href="{{ route('admin.siswa.create') }}" class="inline-block w-fit bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500">+ Tambah</a>
                <!-- <a href="{{ route('print.siswa.print') }}" target="_blank" class="w-fit bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500">Cetak</a> -->
            </div>
    
            <form method="GET" action="{{ route('admin.siswa.search') }}">
                <div class="flex items-center gap-2">
                    <input type="text" name="search" value="{{ request('search') }}"  placeholder="Search..."
                        class="bg-slate-100 text-lg px-3 py-1 transition delay-50 duration-200 hover:ring hover:ring-rose-900 hover:ring-offset-2 rounded-sm shadow-sm shadow-slate-500">
                    
                    <button type="submit" class="w-fit bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500 shadow-sm shadow-slate-500">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    
        <div class="bg-slate-200 flex flex-col shadow shadow-slate-500">
            <div class="overflow-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-rose-900 border-b-2 border-slate-500">
                            <td class="font-semibold text-slate-100 text-lg text-center px-3 py-2 whitespace-nowrap">No.</td>
                            <td class="font-semibold text-slate-100 text-lg text-center px-3 py-2 whitespace-nowrap">NISN</td>
                            <td class="font-semibold text-slate-100 text-lg text-center px-3 py-2 whitespace-nowrap">Nama Siswa</td>
                            <td class="font-semibold text-slate-100 text-lg text-center px-3 py-2 whitespace-nowrap">Tahun Ajaran</td>
                            <td class="font-semibold text-slate-100 text-lg text-center px-3 py-2 whitespace-nowrap">Alamat Siswa</td>
                            <td class="font-semibold text-slate-100 text-lg text-center px-3 py-2 whitespace-nowrap">Jenis Kelamin</td>
                            <td class="font-semibold text-slate-100 text-lg text-center px-3 py-2 whitespace-nowrap">Opsi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <tr class="odd:bg-slate-200 even:bg-slate-100">
                                <td class="font-medium text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="font-medium text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $siswa->nisn }}</td>
                                <td class="font-medium text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $siswa->nama_siswa }}</td>
                                <td class="font-medium text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $siswa->tahun_ajaran }}</td>
                                <td class="font-medium text-slate-700 text-md text-start px-3 py-2 whitespace-nowrap">{{ $siswa->alamat }}</td>
                                <td class="font-medium text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">{{ $siswa->jenis_kelamin }}</td>
                                <td class="font-medium text-slate-700 text-md text-center px-3 py-2 whitespace-nowrap">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.siswa.edit', $siswa) }}" class="bg-green-500 font-medium text-slate-100 text-sm text-center px-3 py-1 transition delay-50 duration-200 hover:bg-green-600">Edit</a>
                                        <form method="POST" action="{{ route('admin.siswa.destroy', $siswa) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 font-medium text-slate-100 text-sm text-center px-3 py-1 transition delay-50 duration-200 hover:bg-red-600">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="flex justify-between p-3">
                <span class="w-full">{{ $siswas->withQueryString()->links() }}</span>
            </div>
        </div>

        <div>
            <form method="GET" action="{{ route('admin.siswa.index') }}">
                <div class="flex justify-end items-center gap-3">
                    <select name="tahun_ajaran" id="tahun_ajaran" class="w-1/5 bg-slate-100 font-semibold text-rose-900 text-lg text-center px-3 py-1 transition delay-50 duration-200 hover:ring hover:ring-rose-900 hover:ring-offset-2 rounded-sm border border-rose-900">
                        <option value="">Tahun Ajaran</option>
                        <option value="">Semua</option>
                        @foreach ($tahunAjarans as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun_ajaran') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
    
                    <button type="submit" name="action" value="filter" class="w-fit bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500">Filter</button>
                    <button type="submit" name="action" value="print" formaction="{{ route('print.siswa.print') }}" formtarget="_blank" class="w-fit bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>