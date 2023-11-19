<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ImgCollection extends Model
{
    use HasFactory;

    protected $table = 'img_products';


    public function items(): HasMany
    {
        return $this->hasMany(Product::class, 'id');
    }
}
