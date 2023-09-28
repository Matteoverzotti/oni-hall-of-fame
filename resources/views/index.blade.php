<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONI Vault</title>
</head>

<body>
    @include('partials._navbar')

    <h1>Bine ai venit la ONI Vault!</h1>
    <h2>Ultimele concursuri</h2>
    
    @if (count($contests) == 0)
        <h2>No contests found!</h2>
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
                    @if ($loop->index < 5)
                        <tr>
                            <td><a
                                    href="{{ route('contests.show', ['name_id' => $contest->name_id]) }}">{{ $contest->name }}</a>
                            </td>
                            <td>{{ $contest->location }}</td>
                            <td>{{ $contest->date }}</td>
                        </tr>
                    @else
                    @break
                @endif
            @endforeach
        </tbody>
    </table>
@endif
</body>

</html>
