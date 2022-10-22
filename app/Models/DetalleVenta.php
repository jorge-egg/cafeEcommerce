<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table="detalleventas";

    protected $primaryKey="idVenta";

    protected $fillable=["cantidad", "precio", "subTotal"];

    public function ventas(){
        return $this->hasMany(Venta::class);
    }
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
