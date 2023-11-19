<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DriveUnit extends Model
{
    use HasFactory;
    protected $table = 'drive_unit';


    public function items(): HasMany
    {
        return $this->hasMany(Product::class, 'id');
    }
}
