<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('admin.users.productoVista', compact('productos'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //agregar
        $modelo = new Producto;
        
        if($request -> hasFile('imagenProducto')){
            $img = $request->file('imagenProducto');
            $url = public_path('img/productos');

            copy($img->getRealPath(), $url."/".$request->input('referencia').".".$img->guessExtension());
            $guardar=$request->input('referencia').".".$img->guessExtension();

            $modelo -> nombre = $request->input('nombre');
            $modelo -> precio = $request->input('precio');
            $modelo -> existencia = $request->input('existencia');
            $modelo -> caracteristica = $request->input('caracteristica');
            $modelo -> categoria = $request->input('categoria');
            $modelo -> referencia = $request->input('referencia');
            $modelo -> imagenProducto = $guardar;
            
        }
        
        
        $modelo -> save();
        return redirect()->route("producto.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualizar
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar
    }
}
