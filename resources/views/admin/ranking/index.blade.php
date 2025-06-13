<x-layout-dashboard>
    <x-slot:heading>
        Ranking
    </x-slot:heading>

    <div class="bg-slate-100 flex justify-between items-center my-2">
        <div class="flex gap-3">
            <x-table.link variant="create" href="{{ route('admin.ranking.create') }}">+ Tambah</x-table.link>
            <x-table.link variant="create" href="{{ route('admin.ranking.showUpdateForm') }}">+ Ranking</x-table.link>
        </div>

        <form method="GET" action="{{ route('admin.ranking.index') }}">
            <div class="flex gap-3">
                <select name="tahun_ajaran" id="tahun_ajaran" class="bg-slate-100 font-semibold text-rose-900 text-lg text-center px-3 py-1 transition delay-50 duration-200 hover:ring hover:ring-rose-900 hover:ring-offset-2 rounded-sm border border-rose-900">
                    <option value="">Semua</option>
                    @foreach ($tahunAjarans as $tahun)
                        <option value="{{ $tahun }}" {{ request('tahun_ajaran') == $tahun ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>
                    @endforeach
                </select>
    
                <button type="submit" class="bg-rose-900 font-bold text-slate-100 text-xl px-3 py-1 transition delay-50 duration-200 hover:bg-rose-500">Filter</button>
            </div>
        </form>
    </div>

    <x-table.container variant="main">

        <x-table.container variant="table">
            <x-table.table>
                <x-table.tr variant="head">
                    <x-table.td variant="head">No.</x-table.td>
                    <x-table.td variant="head">Siswa</x-table.td>
                    <x-table.td variant="head">Tahun Ajaran</x-table.td>
                    <x-table.td variant="head">Nilai Akhir</x-table.td>
                    <x-table.td variant="head">Ranking</x-table.td>
                    <x-table.td variant="head">Opsi</x-table.td>
                </x-table.tr>
                <tbody>
                    @foreach ($rankings as $ranking)
                        <x-table.tr variant="body">
                            <x-table.td variant="body">{{ $loop->iteration }}</x-table.td>
                            <x-table.td variant="body">{{ $ranking->siswa->nama_siswa }}</x-table.td>
                            <x-table.td variant="body">{{ $ranking->siswa->tahun_ajaran }}</x-table.td>
                            <x-table.td variant="body">{{ $ranking->nilai_akhir }}</x-table.td>
                            <x-table.td variant="body">{{ $ranking->ranking }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.link variant="edit" href="#">Edit</x-table.link>
                                    <form method="POST" action="#">
                                        @csrf
                                        @method('DELETE')
                                        <x-table.button type="submit" variant="delete">Hapus</x-table.button>
                                    </form>
                                </x-table.cobtainer>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </x-table.table>
        </x-table.container>

    </x-table.container>
</x-layout-dashboard>