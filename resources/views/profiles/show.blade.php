@include('partials._navbar')
<h1>{{ $profile->name }}</h1>
<p>{{ $profile->email }}</p>

<h2>Participations:</h2>
<ul>
    @foreach ($profile->contestants as $participation)
        @php
            $sub_contest = App\Models\SubContest::find($participation->sub_contest_id);
            $contest = App\Models\Contest::find($sub_contest->contest_id);
        @endphp
        <li><a
                href="{{ route('sub_contests.show', ['name_id' => $contest->name_id, 'sub_contest_name_id' => $sub_contest->name_id]) }}">
                {{ $sub_contest->name }} </a></li>
    @endforeach
</ul>
