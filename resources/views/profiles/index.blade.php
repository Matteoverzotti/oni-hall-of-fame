<x-layout>
    <h2>Profiles:</h2>
    <ul>
        @foreach ($profiles as $profile)
            <li><a href="{{ route('profiles.show', ['id' => $profile->id]) }}">{{ $profile->name }}</a></li>
        @endforeach
    </ul>
</x-layout>
