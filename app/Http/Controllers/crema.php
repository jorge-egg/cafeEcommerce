<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class crema extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $productos = Producto::all();
        return view('crema', compact('productos', 'id'));
    }
}
