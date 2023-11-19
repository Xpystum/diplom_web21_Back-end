<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transmission extends Model
{
    use HasFactory;

    protected $table = 'transmission';


    public function items(): HasMany
    {
        return $this->hasMany(Product::class, 'id');
    }
}
