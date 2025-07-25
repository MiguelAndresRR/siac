<?php

namespace App\Models\proveedor;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $primaryKey = 'id_proveedor';

    public $timestamps = false;

    protected $fillable = [
        'nombre_proveedor',
        'nit_proveedor',
        'direccion_proveedor',
        'telefono_proveedor',
        'correo_proveedor'
    ];
}
