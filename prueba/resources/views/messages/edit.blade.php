@extends('layout')

@section('content')
    <h1>Editar mensaje</h1>
    
    
    <form method="POST" action="{{route('messages.update', $message->id)}}">
          @csrf      
          @method('put')
          @include('messages.form', [
              'btnText' => 'Actualizar',
              'showFields' => ! $message->user_id
              ]) 
    </form>
@endsection