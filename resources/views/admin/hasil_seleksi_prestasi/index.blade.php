<x-layout>

    <table>
        <thead>
            <tr>
                <td>Nama siswa</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->nama_siswa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>