<x-layout>
    <div class="w-full h-screen flex justify-center items-center">
        <div class="w-1/2 bg-slate-200 px-4 py-4 rounded-md shadow shadow-slate-500">
            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="flex flex-col items-center gap-3">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="w-32 bg-cover bg-center my-2">

                    <span class="font-bold text-rose-900 text-2xl text-center">
                        Selamat Datang!
                    </span>

                    <span class="my-1"></span>

                    <div class="flex gap-3 w-full">
                        <label for="username" class="w-1/4 font-semibold text-slate-700 text-xl px-3">Username</label>
                        <input type="text" name="name" id="name" placeholder="Username..." class="w-full bg-slate-100 px-3 py-1">
                    </div>
        
                    <div class="flex gap-3 w-full">
                        <label for="email" class="w-1/4 font-semibold text-slate-700 text-xl px-3">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email..." class="w-full bg-slate-100 px-3 py-1">
                    </div>
        
                    <div class="flex gap-3 w-full">
                        <label for="password" class="w-1/4 font-semibold text-slate-700 text-xl px-3">Password</label>
                        <div class="w-full flex flex-col gap-1">
                            <input type="password" name="password" id="password" placeholder="Password..." class="w-full bg-slate-100 px-3 py-1">
                            <span class="italic text-red-500 text-sm">( Password minimal 8! )</span>
                        </div>
                    </div>
        
                    <div class="flex gap-3 w-full">
                        <label for="password_confirmation" class="w-1/4 font-semibold text-slate-700 text-xl px-3">Konfirmasi</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password..." class="w-full bg-slate-100 px-3 py-1">
                    </div>
                    
                    <span></span>
        
                    <div class="w-full flex flex-col items-center gap-1">
                        <button type="submit" class="w-1/3 bg-rose-900 font-bold text-slate-100 text-center text-lg px-6 py-1 rounded-sm hover:bg-rose-700">Registrasi</button>
                        <a href="{{ route('login') }}" class="text-blue-500 text-sm underline hover:text-blue-700">Sudah punya akun?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>