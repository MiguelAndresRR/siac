<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categoria_producto';
    
    public $timestamps = false;
    
    protected $primaryKey = 'id_categoria_producto';

    protected $fillable = [
        'categoria'
    ];

    public function productos(): HasMany
    {
        return $this->hasMany(Product::class, 'id_categoria_producto');
    }
}
