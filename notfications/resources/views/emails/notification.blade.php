<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aseenti</title>
</head>
<body>
  <h1>{{$user->name}}</h1>
  <p>Has recibido un mensaje</p>
  <a href="{{route('messages.show', $msg->id)}}">Clic aquí para ver el mensaje</a>
  <p>Gracias por usar nuestra aplicación.</p>
</body>
</html>