@props(['action'])

<div class="bg-slate-200 shadow shadow-slate-500 px-4 py-4">
    <form method="POST" action="{{ $action }}">
        @csrf
        <div class="flex flex-col gap-3">
            {{ $slot }}
        </div>
    </form>
</div>