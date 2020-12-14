@extends('layout')


@section('content')
  <img width="150px" src="{{Storage::url($user->avatar)}}" alt="">
  <h1>{{$user->name}}</h1>
  <table class="table">
    <tr>
      <th>Nombre:</th>
      <td>{{$user->name}}</td>
    </tr>
    <tr>
      <th>Email:</th>
      <td>{{$user->email}}</td>
    </tr>
    <tr>
      <th>Roles:</th>
      <td>
        @foreach ($user->roles as $role)
            {{$role->display_name}}
        @endforeach
      </td>
    </tr>
  </table>

  @can('edit', $user)
    <a href="{{route('users.edit', $user->id)}}" class="btn text-white btn-info">Editar</a>
  @endcan

  @can('destroy', $user)
   <form style="display:inline;" 
      method="POST" 
      action="{{route('users.destroy', $user->id)}}">
      @csrf @method('DELETE')
      <button class="btn btn-danger" 
        type="submit">Eliminar
      </button>
   </form>
  @endcan
  
@endsection