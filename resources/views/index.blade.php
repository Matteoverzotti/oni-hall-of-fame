<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ONI Vault</title>
</head>
<body>
  <h1>{{$title}}</h1>

  @if (count($contests) == 0)
    <h2>No contests found!</h2>

  @else

    @foreach($contests as $contest)
        <h2><a href="{{ route('contest.show', ['name_id' => $contest->name_id]) }}">{{ $contest->name }}</a></h2>
    @endforeach

  @endif
</body>
</html>