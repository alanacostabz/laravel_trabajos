@extends('layout')

@section('content')
    <h1>Contactos</h1>
    <h2>Escríbeme</h2>


    @if (session()->has('info'))
        <h3>{{session('info')}}</h3>
    @else
        
        <form method="POST" action="{{route('messages.store')}}">
            @include('messages.form',[
                'btnText' => 'Enviar', 
                'message' => new App\Message,
                'showFields' => auth()->guest()      
            ])
        </form>
   @endif 
@endsection