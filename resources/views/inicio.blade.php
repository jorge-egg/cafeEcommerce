@extends('welcome')

@section('css')
    <link rel="stylesheet" href="{{asset('css/inicio.css')}}">
@stop

@section('contenido')
    <!--<div class="titulo-categoria">Cafe</div>-->
    @foreach ($productos as $producto)
            @if ($producto->categoria === "cafe")
                <div class="content-product">
                    <div class="op-content"></div>
                    <img class="img" src="img/productos/{{$producto->imagenProducto}}" alt="">
                    <div class="content-product-txt">
                        <h4>{{$producto->nombre}}</h4><!--nombre del producto-->
                        <p>${{$producto->precio}}</p><!--precio del producto-->
                        <p>{{$producto->caracteristica}}</p><!--caracteristica del producto-->
                    </div>
                    <div class="middle">
                        <form action="{{route('agregar', $producto->idProducto)}}" method="POST" >
                            @csrf
                            <input type="hidden" value="{{$id}}" name="usuario">
                            <input type="hidden" value="{{$producto->idProducto}}" name="producto">
                            <input type="hidden" value="{{$producto->precio}}" name="precio">
                            <button class="btn-agregar">agregar</button>
                        </form>
                    </div>
                </div>  
            @endif
            
    @endforeach

@stop

@section('js')
    <!--nuevo javaScrip-->
          
@stop