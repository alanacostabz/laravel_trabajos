@extends('layout')

@section('content')
    <h1>Editar usuario</h1>

    @if (session('info'))
      <div class="alert alert-success">
        {{session('info')}}
      </div>
    @endif

    <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">      
        @method('put')

        <img width="100px" src="{{Storage::url($user->avatar)}}" alt="">
            
        @include('users.form')
 
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
@endsection