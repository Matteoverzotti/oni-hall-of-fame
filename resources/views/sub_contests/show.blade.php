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
