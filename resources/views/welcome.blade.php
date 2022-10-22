<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe</title>

    <!-- ----Css-->
 
    <link rel="stylesheet" href="{{asset('css/universal.css')}}">
    @yield('css')
    <!-- ----------------------- -->
    <!-- -------------Fuentes------------------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Montserrat:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <!-- ------------------------------------------------------->

</head>
<body>
    <!-- inicio de cabecera (no incluye nav)-->
    <header>
           <img id="fondo" src="img/fondoDos.jpg" alt=""> 
           <h1 id="txt-titulo">COFFEE GARDEN</h1>
    </header>
    <nav>
        
        
        <form action="{{route('inicio')}}" method="GET" >
            @csrf
            <button class="btn btn-outline-secondary">Cafe</button><!- - boton redireccionador a los productos "cafe"- ->
        </form>
        <form action="{{route('crema')}}" method="GET" >
            @csrf
            <button href="" class="btn btn-outline-secondary">Crema</button><!- - boton redireccionador a los productos lacteos "crema"- ->
        </form>
    
    
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a id="login" href="{{url('/')}}" class="btn btn-outline-secondary">Cerrar seccion</a>
                    @can('admin.home')
                        <a href="{{route('admin.home')}}" class="btn btn-outline-secondary">Administrar</a>
                    @endcan
                @else
                    <a id="login" href="{{ route('login') }}" class="btn btn-outline-secondary">Mi cuenta</a><!-- boton redireccionador al inicio de seccion de usuario-->
                @endauth
            </div>
        @endif

        <form action="{{route('mostrar')}}" method="GET" >
            @csrf
            <button class="btn btn-outline-secondary" id="btn-carro"><img id="carro" src="img/carrito.png" alt=""></button><!- - boton redireccionador al carro de compras- ->
        </form>
    </nav>

    <!-- fin cabecera-->
    <!-- Inicio de cuerpo -->
    <main>
        @yield('contenido')
        
    </main>
    <!-- Fin de cuerpo -->

    <!-- inicio de footer -->

    <footer>
        <div id="redes">
            <a href="https://es-la.facebook.com/"><img src="{{asset('img/facebook.png')}}" alt=""></a>
            <a href="https://www.instagram.com/"><img src="img/instagram.png" alt=""></a>
            <a href="https://twitter.com/?lang=es"><img src="img/twitter.png" alt=""></a>
            <a href="https://web.whatsapp.com/"><img src="img/whatsapp.png" alt=""></a>
            <a href="https://web.telegram.org/z/"><img src="img/telegram.png" alt=""></a>
        </div>
        <div id="txt-footer">
            <p>Diseñado por Jorge Eduardo Garzon Galeano - Johan Esti Hurtado - Juan</p>
        </div>
    </footer>

    <!-- fin de footer -->
    @yield('js')
</body>
</html>