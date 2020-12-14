@extends('layouts.plantilla')

@section('cabecera')
    EDITAR REGISTROS
@endsection

@section('contenido')
    {{-- <form method="post" action="/productos/{{$producto->id}}"> --}}
    {!! Form::model($producto, ['method' => 'POST', 'action' => ['ProductosController@update', $producto->id]]) !!}
      @csrf
      @method('PUT')
      <table>
        <tr>
          <td>Nombre: </td>
          <td>
            <input type="text" name="nombre_articulo" value='{{$producto->nombre_articulo}}'>
          </td>
        </tr>
        <tr>
          <td>Sección: </td>
          <td>
            <input type="text" name="seccion" value='{{$producto->seccion}}'>
          </td>
        </tr>
         <tr>
          <td>Precio: </td>
          <td>
            <input type="text" name="precio" value='{{$producto->precio}}'>
          </td>
        </tr>
         <tr>
          <td>Fecha: </td>
          <td>
            <input type="text" name="fecha" value='{{$producto->fecha}}'>
          </td>
        </tr>
         <tr>
          <td>País de origen: </td>
          <td>
            <input type="text" name="pais_origen" value='{{$producto->pais_origen}}'>
          </td>
        </tr>


        <tr>
          <td>
            <input type="submit" name="actualizar" value="Actualizar">
          </td>
          <td>
            <input type="reset" name="limpar" value="Limpiar Campos">
          </td>
        </tr>
      </table>
    {{-- </form> --}}
    {!! Form::close() !!}

    {{-- <form method="post" action="/productos/{{$producto->id}}"> --}}
    {!! Form::open(['method' => 'DELETE', 'action' => ['ProductosController@destroy', $producto->id]]) !!}
      @csrf
      @method('DELETE')
      <input type="submit" name="actualizar" value="Eliminar">
    {!! Form::close() !!}
    {{-- </form> --}}
@endsection

@section('pie')
    
@endsection