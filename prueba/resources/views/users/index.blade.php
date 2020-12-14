@extends('layout')

@section('content')
    <h1>Usuarios</h1>

    <a href="{{route('users.create')}}" class="btn btn-primary float-right mb-3">
        Crear nuevo usuario
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th>Notas</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{!! $user->present()->link()!!}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->present()->roles()}}</td>
                    <td>{{$user->present()->notes()}}</td>
                    <td>{{$user->present()->tags()}}</td>
                    
                    {{-- <td>

                        {{$user->roles->pluck('display_name')->implode(', ')}} --}}
                        {{-- @foreach ($user->roles as $role)
                            {{$role->display_name}}
                        @endforeach --}}
                    {{-- </td> --}}
                    {{-- <td>{{$user->note ? $user->note->body : ''}}</td> --}}
                    {{-- <td>{{$user->tags->pluck('name')->implode(', ') ?? 'Sin nota'}}</td> --}}
                    <td>
                        <a class="btn btn-info text-white btn-sm" 
                            href="{{route('users.edit', $user->id)}}">
                                Editar
                        </a>

                        <form style="display:inline;" 
                            method="POST" 
                            action="{{route('users.destroy', $user->id)}}">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>  
@endsection