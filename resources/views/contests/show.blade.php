@include('partials._navbar')

<h2>{{ $contest->name }}</h2>
<p>{{ $contest->location }}</p>

<h2>Sub-Contests</h2>
<ul>
    @foreach ($contest->subContests as $sub_contest)
        <li>
            <a href="{{ route('sub_contests.show', [
                    'name_id' => $contest->name_id,
                    'sub_contest_name_id' => $sub_contest->name_id,
                ]) }}">
                {{ $sub_contest->name }}
            </a>
        </li>
    @endforeach
</ul>


<br>
<br>
<br>
<br>
<br>


<a href="/contest/{{ $contest->name_id }}/edit">
    <x-button class="blue-button" type="button">Editează concurs</x-button>
</a>

<form method="POST" action="/contest/{{ $contest->name_id }}">
    @csrf
    @method('DELETE')
    <x-button type="submit"
              class="red-button"
              onclick="return confirm('Are you sure you want to delete this contest?')">
        Delete contest
    </x-button>
</form>
