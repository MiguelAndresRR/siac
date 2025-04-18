<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // 1) Apunta a tu tabla
    protected $table = 'usuario';

    // 2) Tu PK es id_usuario
    protected $primaryKey = 'id_usuario';

    // 3) No tienes timestamps created_at/updated_at
    public $timestamps = false;

    // 4) Columnas "rellenables"
    protected $fillable = [
        'user',
        'password',
        'id_rol',
        'documento',
        'telefono_usuario',
    ];

    // 5) Oculta la password
    protected $hidden = [
        'password',
    ];
}
