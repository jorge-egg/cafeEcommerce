<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $primaryKey = 'idProducto';

    protected $fillable = [
        'nombre', 'precio', 'existencia', 'caracteristica', 'categoria', 'referencia', 'imagenProducto'
    ];

    public $timestamps = false;

    public function detalleVenta(){
        return $this->belongsTo('App\Models\DetalleVenta');
    }
    public function carrito(){
        return $this->belongsTo('App\Models\carrito');
    }
}
