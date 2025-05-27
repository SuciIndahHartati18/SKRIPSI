@props(['action'])

<form method="GET" action="{{ $action }}">
    @csrf
    <input type="text" name="search" value="{{ request('search') }}"  placeholder="Search..."
        class="bfg-slate-200 text-lg px-3 py-1 transition delay-50 duration-200 hover:ring hover:ring-rose-900 hover:ring-offset-2">
</form>