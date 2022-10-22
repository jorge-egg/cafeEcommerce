<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use App\Models\cliente;
use App\Models\Producto;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class carritoController extends Controller
{
    public function agregar(Request $request){
       $id = Auth::id();
       if($id==null){
    
        return redirect()->route('inicio')->with('creado', 'ok');
       }
       carrito::create([
        'idUsuario' => $id,
        'idProducto' => $request->input('producto'),
        'precio' => $request->input('precio'),
        'cantidadCarrito' => 1,
        'total' => $request->input('precio')
       ]);
       return redirect()->route('mostrar');
    }
    public function mostrar(){
        $id = Auth::id();
       if($id==null){
        return redirect()->route('inicio')->with('creado', 'ok');
       }//si no esta logueado entonces no permitir acceso al carrito
        $productsCart=carrito::join('users', 'users.id', 'carrito.idUsuario')->join('productos', 'productos.idProducto', 'carrito.idProducto')->where('users.id', $id)->get();/*join(tabla en bd a donde ingreso, campos a comprar 1, campo a comprara 2)->where('users.id', $id)*/ 
        return view('carrito', compact('productsCart'));
    }
    public function modificar($idCarrito, Request $request){
        $id = Auth::id();
        $existe=carrito::join('users', 'users.id', 'carrito.idUsuario')->join('productos', 'productos.idProducto', 'carrito.idProducto')->where('users.id', $id)->exists();
        
        if($existe==true){
            $actualizar = carrito::FindOrFail($idCarrito);
            $actualizar -> cantidadCarrito = $request->input('cantidad');
            $actualizar -> total = ($actualizar->precio)*$actualizar->cantidadCarrito;
            $actualizar->save();
        }//fin de procesode validacion
        return redirect()->route('mostrar');
    }
    /*https://spatie.be/docs/laravel-permission/v5/introduction
    https://www.youtube.com/watch?v=L42lLOOLB8g&list=PLZ2ovOgdI-kXghwSkvcQ1zVbsyUeYD8Wi
    $precio_carrotp = carrito::JOIN('users'...)->sum(' precio ');
    compact(' precio_carrito ')*/ 

    public function eliminar($idCarrito){
        $eliminar = carrito::FindOrFail($idCarrito);
        $eliminar->delete();
        return redirect()->route('mostrar')->with('message', 'ok');
    }
}


