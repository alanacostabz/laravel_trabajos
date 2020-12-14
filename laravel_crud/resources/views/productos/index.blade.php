@extends('layouts.plantilla')

@section('cabecera')
    LEER REGISTROS
@endsection

@section('contenido')
    
  <table border="1">
    <thead>
      <tr>
        <th>Nombre artículo</th>
        <th>Sección</th>
        <th>Precio</th>
        <th>Fecha</th>
        <th>País de origen</th>
        <th>Imagen</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($productos as $producto)
         <tr>

            <td>
              <a href="{{route('productos.edit', $producto->id)}}">
                {{$producto->nombre_articulo}}
              </a>
            </td>

            <td>{{$producto->seccion}}</td>
            <td>{{$producto->precio}}</td>
            <td>{{$producto->fecha}}</td>
            <td>{{$producto->pais_origen}}</td>
            <td>
              <img src="images/{{$producto->ruta}}" width="150" alt="img">
            </td>
         </tr>
        @endforeach
    </tbody>
  </table>
      
@endsection

@section('pie')
    
@endsection