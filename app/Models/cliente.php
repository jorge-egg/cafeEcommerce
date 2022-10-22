<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;

    protected $table='clientes';

    protected $primaryKey='idCliente';

    protected $fillable=['email', 'nombre', 'telefono', 'ciudad', 'departamento', 'direccion', 'barrio', 'indicacionAdc'];

    public function venta(){
        return $this->belongsTo(Venta::class);
    }
    public function carrito(){
        return $this->belongsTo(carrito::class);
    }
}
