<x-layout>
    <div class="bg-slate-200">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="flex flex-col">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email..." class="bg-slate-100 px-3 py-1">
                @error ('email')
                    <span class="text-red-500 text-sm italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password..." class="bg-slate-100 px-3 py-1">
                @error ('password')
                    <span class="text-red-500 text-sm italic">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500/80 px-3 py-1">Log In</button>
            </div>
        </form>
    </div>
</x-layout>