@extends('layout')

@section('content')
    <h1>Todos los mensajes</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Notas</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <td>{{$message->id}}</td>
                    <td>{{$message->present()->userName()}}</td>
                    <td>{{$message->present()->userEmail()}}</td>
                    <td>{{{$message->present()->link()}}}</td>
                    <td>{{$message->present()->notes()}}</td>
                    <td>{{$message->present()->tags()}}</td>
                    {{-- @if ($message->user_id)
                        <td>
                            <a href="{{route('users.show', $message->user_id)}}">
                                {{$message->user->name}}
                            </a>
                        </td>
                        <td>{{$message->user->email}}</td>
                    @else
                        <td>{{$message->nombre}}</td>
                        <td>{{$message->email}}</td>
                    @endif --}}
                    {{-- <td>
                        <a href="{{route('messages.show',$message->id)}}">
                            {{$message->mensaje}}
                        </a>
                    </td> --}}
                    {{-- <td>{{$message->note ? $message->note->body : ''}}</td> --}}
                    {{-- <td>{{$message->tags->pluck('name')->implode(', ')}}</td> --}}
                    <td>
                        <a class="btn btn-info text-white btn-sm" href="{{route('messages.edit', $message->id)}}">
                            Editar
                        </a>
                        <form style="display:inline;" method="POST" action="{{route('messages.destroy', $message->id)}}">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {!! $messages->appends(request()->query())->links() !!}

            {{-- Para agregar hashes --}}
            {{-- {!! $messages->fragment('hash')->appends(request()->query())->links() !!} --}}
        </tbody>
    </table>    
@endsection