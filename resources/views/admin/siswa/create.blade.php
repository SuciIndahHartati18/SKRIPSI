<x-layout>
    <form action="{{ route('admin.siswa.store') }}" method="post">
        @csrf
        <div class="flex flex-col justify-start">
            <label for="nisn">nisn</label>
            <input type="text" name="nisn" id="nisn" placeholder="nisn..."  class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

            <label for="nama_siswa">nama siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa" placeholder="nama_siswa..." class="bg-slate-100 border">

            <label for="alamat">alamat</label>
            <textarea name="alamat" id="alamat" placeholder="Alamat..." rows="4" class="bg-slate-100 border resize-none"></textarea>

            <label for="jalur">jalur</label>
           <select name="jalur" id="jalur" class="bg-slate-100 border">
            <option value="Prestasi">Prestasi</option>
            <option value="Tes">Tes</option>
           </select>

            <label for="jenis_kelamin">jenis kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="bg-slate-100 border">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <button type="submit" class="bg-blue-500 w-fit text-white px-3 py-1">Simpan</button>
        </div>
    </form>
</x-layout>