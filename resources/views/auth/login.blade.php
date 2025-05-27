<x-layout>
    <div class="w-full h-screen flex justify-center items-center">
        <div class="w-1/2 bg-slate-200 px-4 py-4 rounded-md shadow shadow-slate-500">
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="flex flex-col items-center gap-3">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="w-32 bg-cover bg-center my-2">

                    <span class="w-1/2 font-bold text-rose-900 text-2xl text-center">
                        Aplikasi Seleksi Calon Siswa Baru MTsS Jorong
                    </span>

                    <span class="my-1"></span>

                    <div class="flex gap-3 w-full">
                        <label for="email" class="w-1/4 font-semibold text-slate-700 text-xl px-3">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email..." class="w-full bg-slate-100 px-3 py-1" />
                        @error ('email')
                            <span class="text-red-500 text-sm italic">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="flex gap-3 w-full">
                        <label for="password" class="w-1/4 font-semibold text-slate-700 text-xl px-3">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password..." class="w-full bg-slate-100 px-3 py-1" />
                        @error ('password')
                            <span class="text-red-500 text-sm italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <span></span>
        
                    <div class="w-full flex flex-col items-center gap-1">
                        <button type="submit" class="w-1/3 bg-rose-900 font-bold text-slate-100 text-center text-lg px-6 py-1 rounded-sm hover:bg-rose-700">Log In</button>
                        <a href="{{ route('register') }}" class="text-blue-500 text-sm underline hover:text-blue-700">Belum punya akun?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>