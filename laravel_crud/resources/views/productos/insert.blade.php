@extends('layouts.plantilla')

@section('cabecera')
    
@endsection

@section('contenido')
    <form method="post">
      <input type="text" name="nombre_articulo">

      <input type="submit" name="enviar" value="Enviar">
    </form>
@endsection