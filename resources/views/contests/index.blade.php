@include('partials._navbar')

<h2>Concursuri</h2>

@if (count($contests) == 0)
<h2>Nu s-au găsit concursuri!</h2>

@else
<table>
    <thead>
        <tr>
            <th>Nume</th>
            <th>Locatie</th>
            <th>Dată</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contests as $contest)
        <tr>
            <td><a href="{{ route('contests.show', ['name_id' => $contest->name_id]) }}">{{ $contest->name }}</a></td>
            <td>{{$contest->location}}</td>
            <td>{{$contest->date}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endif