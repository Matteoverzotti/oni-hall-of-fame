<!-- resources/views/components/button.blade.php -->

@props(['type', 'class', 'onclick'])

<button type="{{ $type }}" class="{{ $class }}" @if(isset($onclick)) onclick="{{ $onclick }}" @endif>
    {{ $slot }}
</button>
