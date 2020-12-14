@extends('layout')

@section('content')
    <h1>Mensaje</h1>
  <p>Enviado por {{$message->present()->userName()}} - {{$message->present()->userEmail()}}</p>
  <p>{{$message->mensaje}}</p>
@endsection