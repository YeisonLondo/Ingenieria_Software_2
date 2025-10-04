<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'nombre_usuario',
        'id_clase',
        'estado',
        'metodo_pago'
    ];
}