<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ONI Vault</title>
</head>
<body>
  <h1>{{$title}}</h1>

  @foreach($contests as $contest)

    <h2><a href='/contest/{{$contest['id']}}'>{{$contest['title']}}</a></h2>
    <p>{{$contest['location']}}</p>

  @endforeach
</body>
</html>