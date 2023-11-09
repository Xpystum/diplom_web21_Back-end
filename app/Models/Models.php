<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Models extends Model
{
    use HasFactory;
    protected $table = 'models';

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'id');
    }
    
}
