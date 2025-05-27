<x-layout>
    
    <div class="bg-slate-200">
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="flex flex-col">
                <label for="username">Username</label>
                <input type="text" name="name" id="name" placeholder="Username..." class="bg-slate-100 px-3 py-1">
            </div>

            <div class="flex flex-col">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email..." class="bg-slate-100 px-3 py-1">
            </div>

            <div class="flex flex-col">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password..." class="bg-slate-100 px-3 py-1">
            </div>

            <div class="flex flex-col">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password..." class="bg-slate-100 px-3 py-1">
            </div>

            <div>
                <button type="submit" class="bg-blue-500/80 px-3 py-1">Sig In</button>
            </div>
        </form>
    </div>
</x-layout>