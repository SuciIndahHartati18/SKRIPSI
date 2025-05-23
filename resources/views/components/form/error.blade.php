@props(['errorFor'])

@error ($errorFor)
    <span class="text-red-500 text-sm italic px-3">{{ $message }}</span>
@enderror