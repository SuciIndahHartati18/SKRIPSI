<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTS Manhajussalam Jorong</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">
    <div class="h-screen flex">
        <aside class="w-64 bg-rose-900 flex flex-col justify-between items-center px-3 py-3">
            <div class="w-full flex flex-col items-center gap-3">
                <div class="bg-slate-100 p-2 rounded-sm">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="w-32 bg-cover bg-center">
                </div>
    
                <span class="w-full border border-slate-100"></span>
    
                <nav class="w-full flex flex-col gap-1">
                    <x-nav-bar.link href="{{ route('dashboard') }}">Dashboard</x-nav-bar.link>
                    <x-nav-bar.link href="{{ route('admin.siswa.index') }}">Siswa</x-nav-bar.link>
                    <x-nav-bar.link href="{{ route('admin.kriteria_prestasi.index') }}">Kriteria Prestasi</x-nav-bar.link>
                    <x-nav-bar.link href="{{ route('admin.kriteria_tes.index') }}">Kriteria Tes</x-nav-bar.link>
                    <x-nav-bar.link href="{{ route('admin.perhitungan_jalur_prestasi.index') }}">Perhitungan Prestasi</x-nav-bar.link>
                    <x-nav-bar.link href="{{ route('admin.perhitungan_jalur_tes.index') }}">Perhitungan Tes</x-nav-bar.link>
                    <x-nav-bar.link href="{{ route('admin.akun.edit', Auth::user()->id) }}">Ganti Password</x-nav-bar.link>
                </nav>
            </div>

            @auth
                <div class="w-full">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-slate-100 font-bold text-rose-900 text-2xl px-3 py-1 rounded-sm transition delay-50 duration-300 hover:bg-slate-300">Log Out</button>
                    </form>
                </div>
            @endauth
        </aside>

        <main class="flex-1 overflow-auto">
            <div class="sticky top-0 left-0 bg-slate-200 px-3 py-1 shadow-md shadow-700">
                <span class="font-bold text-rose-900 text-2xl">{{ $heading }}</span>
            </div>

            <div class="flex flex-col p-4">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>