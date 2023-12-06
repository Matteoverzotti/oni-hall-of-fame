<!-- resources/views/components/error-message.blade.php -->

@props(['name'])

@php
    $errorName = is_array($name) ? implode('.', $name) : $name;
@endphp

@error($errorName)
<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
@enderror
