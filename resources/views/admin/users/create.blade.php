@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
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