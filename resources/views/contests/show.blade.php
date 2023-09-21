@include('partials._navbar')

<h2>{{ $contest->name }}</h2>
<p>{{ $contest->location }}</p>

<h2>Sub-Contests</h2>
<ul>
    @foreach ($contest->subContests as $sub_contest)
        <li>
            <a
                href="{{ route('sub_contests.show', [
                    'name_id' => $contest->name_id,
                    'sub_contest_name_id' => $sub_contest->name_id,
                ]) }}">
                {{ $sub_contest->name }}
            </a>
        </li>
    @endforeach
</ul>
