<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\compras\Compras;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';

    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    protected $fillable = [
        'user',
        'password',
        'id_rol',
        'documento_usuario',
        'telefono_usuario',
        'nombre_usuario',
        'apellido_usuario',
        'correo_usuario'
    ];

    protected $hidden = [
        'password',
        'user'
    ];
        public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function compras(): HasMany
    {
        return $this->hasMany(Compras::class, 'id_usuario');
    }

}
