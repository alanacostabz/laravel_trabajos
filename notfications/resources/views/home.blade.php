@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enviar mensaje</div>

                <form method="post" action="{{route('messages.store')}}">
                    @csrf
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <select name="recipient_id" class="form-control  {{$errors->has('recipient_id') ? 'is-invalid' : ''}}">
                            <option value="">Selecciona el usuario</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        {!!$errors->first('recipient_id', '<span class="form-text text-danger">:message</span>')!!}
                    </div>

                    <div class="form-group">
                        <textarea name="body" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" placeholder="Escribe aquí tu mensaje..."></textarea>
                        {!!$errors->first('body', '<span class="form-text text-danger">:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Enviar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
