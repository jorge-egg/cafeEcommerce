<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table='ventas';

    protected $primaryKey='idVenta';

    protected $fillable=['fecha'];

    public function clientes(){
        return $this->hasMany(cliente::class);
    }

    public function detalleVenta(){
        return $this->belongsTo(DetalleVenta::class);
    }
}
