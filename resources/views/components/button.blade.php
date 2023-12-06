<!-- resources/views/components/button.blade.php -->

@props(['type', 'class'])

<button type="{{ $type }}" class="{{ $class }}">
    {{ $slot }}
</button>
