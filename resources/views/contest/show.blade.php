<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ONI Vault</title>
</head>
<body>
    <a href='{{ url()->previous() }}'><- Go back</a>
    <h2>{{$contest->name}}</h2>
    <p>{{$contest->location}}</p>

    <h2>Sub-Contests</h2>
    <ul>
    @foreach ($contest->subContests as $sub_contest)
        <li>
            <a href="{{ route('sub_contest.show', [
                'name_id' => $contest->name_id,
                'sub_contest_name_id' => $sub_contest->name_id
            ]) }}">
                {{ $sub_contest->name }}
            </a>
        </li>
    @endforeach
    </ul>
</body>
</html>