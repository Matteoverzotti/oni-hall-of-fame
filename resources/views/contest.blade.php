<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ONI Vault</title>
</head>
<body>
    <a href='/'><- Go back</a>
    <h2>{{$contest->name}}</h2>
    <p>{{$contest->location}}</p>
    
    <h2>Sub-Contests</h2>
    <ul>
    @foreach ($contest->subContests as $subcontest)
        <li>
            <a href="{{ route('subcontest.show', [
                'name_id' => $contest->name_id, 
                'subcontest_id' => $subcontest->name_id
            ]) }}">
                {{ $subcontest->name }}
            </a>
        </li>
    @endforeach
    </ul>
</body>
</html>