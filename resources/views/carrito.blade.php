@extends('welcome')

@section('css')
    <link rel="stylesheet" href="{{asset('css/carrito.css')}}">
@stop

@section('contenido')
    
    <div id="product_cart">
        @foreach ($productsCart as $productCart)
            <div class="content-product">
                <img src='{{asset("img/productos/$productCart->imagenProducto")}}' alt="">
                <div class="content-product-txt">
                    <h4>{{$productCart->nombre}}</h4><!--nombre del producto-->
                    <p>${{$productCart->precio}}</p><!--precio del producto-->
                    <p>Referencia: {{$productCart->referencia}}</p><!--precio del producto-->
                </div>
        
                <form class="changeCant" action="{{route('modificar', $productCart->idCarrito)}}" method="POST" >
                    @csrf
                    <input class="cant" type="number" value="{{$productCart->cantidadCarrito}}" name="cantidad">
                    <button class="btn-agregar">actualizar</button>
                </form>
        
                <div class="changeCant info">
                    <form action="{{route('eliminar', $productCart->idCarrito)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button class="btn-agregar">Eliminar</button>
                    </form>
                    <h5>Total: <p>${{$productCart->total}}</p></h2>
                </div>

            </div>  
        @endforeach
    </div>
    <div id="total_cart">
        <h3>Total</h3>
        <label>{{$totalFinal = 0}}</label>
        @foreach ($productsCart as $productCart)
        
            <label>{{$totalFinal=$totalFinal+$productCart->total}}</label>
        
        @endforeach
        <p>${{$totalFinal}}</p>
    </div>
    
@stop

@section('js')
    <!--nuevo javaScrip-->
    
@stop