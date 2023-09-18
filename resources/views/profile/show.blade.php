<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONI Vault</title>
</head>

<body>
    <a href='{{ url()->previous() }}'><- Go back</a>
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
                    href="{{ route('sub_contest.show', [
                        'name_id' => $contest->name_id,
                        'sub_contest_name_id' => $sub_contest->name_id,
                    ]) }}">
                    {{ $sub_contest->name }}
                </a></li>
        @endforeach
    </ul>
</body>

</html>
