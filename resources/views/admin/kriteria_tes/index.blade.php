<x-layout-dashboard>
    <x-slot:heading>
        KRITERIA PRESTASI
    </x-slot:heading>

    <x-table.container variant="heading">
        <x-table.link variant="create" href="{{ route('admin.kriteria_tes.create') }}">+ Tambah</x-table.link>
        <x-table.search action="{{ route('admin.kriteria_prestasi.search') }}" />
    </x-table.container>

    <x-table.container variant="main">
        <x-table.container variant="table">
            <x-table.table>
                <x-table.tr variant="head">
                    <x-table.td variant="head">No.</x-table.td>
                    <x-table.td variant="head">ID Kriteria</x-table.td>
                    <x-table.td variant="head">Kriteria</x-table.td>
                    <x-table.td variant="head">Tipe</x-table.td>
                    <x-table.td variant="head">Bobot</x-table.td>
                    <x-table.td variant="head">Opsi</x-table.td>
                </x-table.tr>
                <tbody>
                    @foreach ($kriteriaTes as $kriteria)
                        <x-table.tr variant="body">
                            <x-table.td variant="body">{{ $loop->iteration }}</x-table.td>
                            <x-table.td variant="body">{{ $kriteria->id }}</x-table.td>
                            <x-table.td variant="body">{{ $kriteria->nama_kriteria_tes }}</x-table.td>
                            <x-table.td variant="body">{{ $kriteria->tipe_kriteria_tes }}</x-table.td>
                            <x-table.td variant="body">{{ $kriteria->bobot_kriteria_tes }}</x-table.td>
                            <x-table.td>
                                <x-table.container variant="button">
                                    <x-table.link variant="edit" href="{{ route('admin.kriteria_tes.edit', $kriteria) }}">Edit</x-table.link>
                                    <form method="POST" action="{{ route('admin.kriteria_tes.destroy', $kriteria) }}">
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
    
        <x-table.container variant="footing">
            <x-table.span variant="footing">{{ $kriteriaTes->links() }}</x-table.span>
        </x-table.container>
    </x-table.container>
</x-layout-dashboard>