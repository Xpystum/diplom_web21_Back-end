<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BodyType extends Model
{
    use HasFactory;

    protected $table = 'body_type';


    public function items(): HasMany
    {
        return $this->hasMany(Product::class, 'id', Review::class, 'id');
    }

}
