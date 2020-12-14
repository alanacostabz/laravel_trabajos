@extends('layouts.app')

@section('content')
    <div class="container">
      <h1>Notificaciones</h1>
      <div class="row">
        <div class="col-sm-6">
          <h2>No leídas</h2>
          @foreach ($unreadNotifications as $unreadNotification)
              <ul class="list-group">
                <li class="list-group-item">
                  <a href="{{$unreadNotification->data['link']}}">
                    {{$unreadNotification->data['text']}}
                  </a>


                  <form method="post" action="{{route('notifications.read', $unreadNotification->id)}}" class="float-right">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger btn-xs">X</button>
                  </form>
                </li>
              </ul>
          @endforeach
        </div>
        <div class="col-sm-6">
          <h2>Leídas</h2>
           @foreach ($readNotifications as $readNotification)
              <ul class="list-group">
                <li class="list-group-item">
                  <a href="{{$readNotification->data['link']}}">
                    {{$readNotification->data['text']}}
                  </a>
                  <form method="post" action="{{route('notifications.destroy', $readNotification->id)}}" class="float-right">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs">X</button>
                  </form>
                </li>
              </ul>
          @endforeach
        </div>
      </div>
    </div>
@endsection