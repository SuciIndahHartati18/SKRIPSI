<x-layout>
    <div class="h-screen flex">
        <aside class="w-64 bg-slate-700 flex flex-col items-center py-3 gap-3">
            <span class="font-bold text-slate-100 text-3xl">LOGO'S</span>

            <span class="w-full border border-slate-100"></span>

            <nav class="w-full flex flex-col gap-1">
                <x-nav-bar.link href="{{ route('dashboard') }}">Dashboard</x-nav-bar.link>
                <x-nav-bar.link href="{{ route('admin.siswa.create') }}">Siswa</x-nav-bar.link>

                <x-nav-bar.link href="{{ route('admin.kriteria_tes.create') }}">Kriteria Tes</x-nav-bar.link>
                <x-nav-bar.link href="{{ route('admin.nilai_tes.create') }}">Nilai Tes</x-nav-bar.link>
                <x-nav-bar.link href="{{ route('admin.normalisasi_tes.create') }}">Normalisasi Tes</x-nav-bar.link>
                <x-nav-bar.link href="{{ route('admin.hasil_seleksi_tes.create') }}">Hasil Seleksi Tes</x-nav-bar.link>

                <x-nav-bar.link href="{{ route('admin.kriteria_prestasi.create') }}">Kriteria Prestasi</x-nav-bar.link>
                <x-nav-bar.link href="{{ route('admin.nilai_prestasi.create') }}">Nilai Prestasi</x-nav-bar.link>
                <x-nav-bar.link href="{{ route('admin.normalisasi_prestasi.create') }}">Normalisasi Prestasi</x-nav-bar.link>
                <x-nav-bar.link href="{{ route('admin.hasil_seleksi_prestasi.create') }}">Hasil Seleksi Prestasi</x-nav-bar.link>
            </nav>
        </aside>

        <main class="flex-1">
            <div class="sticky top-0 left-0 bg-slate-200 px-3 py-1 shadow-md shadow-700">
                <span class="font-semibold text-slate-700 text-2xl">Dashboard</span>
            </div>

            <div class="flex flex-col">
                //
            </div>
        </main>
    </div>
</x-layout>