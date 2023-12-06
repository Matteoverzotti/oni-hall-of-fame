@include('partials._navbar')

<h2>{{ $sub_contest->name }}</h2>
<p>{{ $sub_contest->location }}</p>
<p>{{ $sub_contest->date }}</p>

<h2>Participants</h2>
<table>
    <thead>
        <tr>
            <th>Loc</th>
            <th>Nume</th>
            <th>Echipă</th>
            <th>Județ</th>
            <th>Medalie</th>
            <th>Premiu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sub_contest->contestants as $contestant)
        <tr>
            <td>{{$contestant->place}}</td>
            <td><a href="{{ route('profiles.show', ['id' => $contestant->profile_id]) }}">{{ $contestant->name }}</td>
            <td>{{$contestant->team}}</td>
            <td>{{$contestant->region}}</td>
            <td>{{$contestant->medal}}</td>
            <td>{{$contestant->prize}}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<form method="POST" action="/contest/{{ $contest->name_id }}/{{ $sub_contest->name_id }}">
    @csrf
    @method('DELETE')
    <x-button type="submit"
              class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
        Delete sub-contest
    </x-button>
</form>
