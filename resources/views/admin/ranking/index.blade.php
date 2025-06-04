<x-layout-dashboard>
    <x-slot:heading>
        Ranking
    </x-slot:heading>

    <div class="bg-slate-100 flex justify-between items-center my-2">
        <div class="flex gap-3">
            <x-table.link variant="create" href="{{ route('admin.ranking.create') }}">+ Tambah</x-table.link>
            <x-table.link variant="create" href="{{ route('admin.ranking.showUpdateForm') }}">+ Ranking</x-table.link>
        </div>

        <div class="flex h-fit">
            <form method="GET" action="{{ route('admin.ranking.filter') }}" class="mb-4">
                <div class="h-fit">
                    <label for="tahun_ajaran" class="font-semibold text-rose-900 text-lg">Filter: </label>
                    <select name="tahun_ajaran" id="tahun_ajaran" onchange="this.form.submit()" class="border border-rose-700 bg-slate-100">
                        <option value="">-- Semua Tahun --</option>
                        @foreach ($tahunAjaranList as $tahun)
                            <option value="{{ $tahun }}" {{ $tahun == $tahunAjaran ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
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