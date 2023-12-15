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

<a href="/contest/{{ $contest->name_id }}/edit">Edit contest</a>

<form method="POST" action="/contest/{{ $contest->name_id }}">
    @csrf
    @method('DELETE')
    <x-button type="submit"
              class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
              onclick="return confirm('Are you sure you want to delete this contest?')">
        Delete contest
    </x-button>
</form>
