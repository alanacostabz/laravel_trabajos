@extends('layouts.plantilla')

@section('cabecera')
    INSERTAR REGISTROS
@endsection

@section('contenido')
    {{-- <form method="post" action="/productos"> --}}
    {!!Form::open(['url' => '/productos','method' => 'post', 'files'=>true, 'enctype'=>'multipart/form-data'])!!}
       @csrf
      <table>
        <tr>
          <td>{!! Form::file('file') !!}</td>
        </tr>
      </table>

     
      <table>
        <tr>
          {{-- <td>Nombre: </td> --}}
          <td>{{Form::label('nombre_articulo', 'Nombre Artículo')}}</td>
          <td>
            {{-- <input type="text" name="nombre_articulo"> --}}
            {{Form::text('nombre_articulo')}}
          </td>
        </tr>
        <tr>
          <td>Sección: </td>
          <td>
            <input type="text" name="seccion">
          </td>
        </tr>
         <tr>
          <td>Precio: </td>
          <td>
            <input type="text" name="precio">
          </td>
        </tr>
         <tr>
          <td>Fecha: </td>
          <td>
            <input type="text" name="fecha">
          </td>
        </tr>
         <tr>
          <td>País de origen: </td>
          <td>
            <input type="text" name="pais_origen">
          </td>
        </tr>


        <tr>
          <td>
            {{-- <input type="submit" name="enviar" value="Enviar"> --}}
            {!! Form::submit('Enviar') !!}
          </td>
          <td>
            {{-- <input type="reset" name="borrar" value="Borrar"> --}}
            {!! Form::reset('Limpiar Campos') !!}
          </td>
        </tr>
      </table>
    {{-- </form> --}}
    {!! Form::close() !!}

    @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach 
      </ul>   
    @endif
@endsection


@section('pie')
    
@endsection