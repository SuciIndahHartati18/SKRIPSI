<x-layout-dashboard>
    <x-slot:heading>
        Ganti Password
    </x-slot:heading>

    <x-form.form action="{{ route('admin.akun.update', $user) }}">
        @method('PUT')

        <x-form.container variant="label-input">
            <x-form.label for="name">Username</x-form.label>
            <x-form.input type="text" name="name" id="name" placeholder="Username" :value="old('name', $user->name)" required/>
            <x-form.error errorFor="name" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="email">Email</x-form.label>
            <x-form.input type="email" name="email" id="email" placeholder="Email" :value="old('email', $user->email)" required/>
            <x-form.error errorFor="email" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="password" class="text-teal-600!">Password Baru</x-form.label>
            <x-form.input type="password" name="password" id="password" placeholder="Password Baru" />
            <x-form.error errorFor="password" />
        </x-form.container>

        <x-form.container variant="label-input">
            <x-form.label for="konfirmasi_password" class="text-teal-600!">Konfirmasi Password Baru</x-form.label>
            <x-form.input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password Baru" />
            <x-form.error errorFor="password_confirmation" />
        </x-form.container>

        <x-form.container variant="button">
            <button type="submit" class="bg-blue-500 font-semibold text-slate-100 text-center text-xl px-4 py-1 transition delay-50 duration-300 hover:bg-blue-600">Simpan</button>
        </x-form.container>
    </x-form.form>
</x-layout-dashboard>