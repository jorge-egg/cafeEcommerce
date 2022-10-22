<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    use HasFactory;

    protected $table = 'carrito';

    protected $primaryKey = 'idCarrito';

    protected $fillable = [
        'precio', 'cantidadCarrito', 'total', 'idProducto', 'idUsuario'
    ];

    public $timestamps = false;

    public function Productos(){
        return $this->hasMany(Producto::class);
    }
    public function clientes(){
        return $this->hasMany(cliente::class);
    }
}
