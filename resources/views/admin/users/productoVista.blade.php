@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<form method="POST" action="{{ route('cliente.create') }}" enctype="multipart/form-data">
  @csrf
  <input
    type="text"
    name="nombre"
    placeholder="Nombre"
    class="form-control mb-2"
  />
  <input
    type="number"
    name="precio"
    placeholder="precio"
    class="form-control mb-2"
  />
  <input
    type="number"
    name="existencia"
    placeholder="existencia"
    class="form-control mb-2"
  />
  <input
    type="text"
    name="caracteristica"
    placeholder="caracteristica"
    class="form-control mb-2"
  />
  <input
    type="text"
    name="categoria"
    placeholder="categoria"
    class="form-control mb-2"
  />
  <input
    type="text"
    name="referencia"
    placeholder="referencia"
    class="form-control mb-2"
  />
    <input type="file" class="form-control" name="imagenProducto" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
  <button class="btn btn-primary btn-block" type="submit">Agregar</button>
</form>

<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nombre</th>
          <th scope="col">precio</th>
          <th scope="col">existencias</th>
          <th scope="col">caracteristicas</th>
          <th scope="col">categoria</th>
          <th scope="col">referencia</th>
          <th scope="col">imagen</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productos as $producto)
          <tr>
            <th scope="row">{{$producto->idProducto}}</th>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->precio}}</td>
            <td>{{$producto->existencia}}</td>
            <td>{{$producto->caracteristica}}</td>
            <td>{{$producto->categoria}}</td>
            <td>{{$producto->referencia}}</td>
            <td><img id="logo" src="img/productos/{{$producto->imagenProducto}}" alt=""> </td>
          </tr>
        @endforeach
        <style type="text/css">
          img { height: 50px; }
        </style>
        
        
      </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if (session('creado') == 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Registro guardado',
        showConfirmButton: false,
        timer: 1700
      })
      </script>
    @endif
    @if (session('actualizado') == 'ok')
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Registro actualizado',
        showConfirmButton: false,
        timer: 1700
      })
      </script>
    @endif
@stop