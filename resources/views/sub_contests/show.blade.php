@include('partials._navbar')

<h2>{{ $sub_contest->name }}</h2>
<p>{{ $sub_contest->location }}</p>
<p>{{ $sub_contest->date }}</p>

<h2>Participants</h2>
<ul>
    @foreach ($sub_contest->contestants as $contestant)
        <li>
            <a href="{{ route('profiles.show', ['id' => $contestant->profile_id]) }}">{{ $contestant->name }}</a>
        </li>
    @endforeach
</ul>
