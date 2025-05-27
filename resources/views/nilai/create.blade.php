<x-layout>
    <div class="max-w-4xl mx-auto p-4 bg-white shadow rounded">
        <h2 class="text-xl font-semibold mb-4">Input Nilai Siswa per Kriteria</h2>

        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="siswa_id" class="block font-medium">Pilih Siswa:</label>
                <select name="siswa_id" id="siswa_id" class="w-full border rounded p-2" required>
                    @foreach ($siswaList as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>

            <h4 class="font-semibold mb-2">Masukkan Nilai untuk Setiap Kriteria:</h4>
            @foreach ($kriteriaList as $kriteria)
            <div class="mb-3">
                <label class="block">{{ $kriteria->nama_kriteria_prestasi }}</label>
                <input type="number" name="nilai[{{ $kriteria->id }}]" step="0.01" class="w-full border rounded p-2"
                    required>
            </div>
            @endforeach

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Nilai
            </button>
        </form>
    </div>
</x-layout>