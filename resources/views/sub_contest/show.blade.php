<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ONI Vault</title>
</head>
<body>
    <a href='{{ url()->previous() }}'><- Go back</a>

    <h2>{{$sub_contest->name}}</h2>
    <p>{{$sub_contest->location}}</p>
    <p>{{$sub_contest->date}}</p>

    <h2>Participants</h2>
    <ul>
    @foreach ($sub_contest->contestants as $contestant)
        <li>
            <a href="{{ route('profile.show', ['id' => $contestant->profile_id]) }}">{{ $contestant->name }}</a>
        </li>
    @endforeach
    </ul>
</body>
</html>