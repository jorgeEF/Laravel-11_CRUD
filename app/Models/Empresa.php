<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'razon_social',
        'nombre_fantasia',
        'cuit',
        'email',
        'provincia',
        'ciudad',
        'domicilio',
        'telefono',
        'estado'
    ];
}
