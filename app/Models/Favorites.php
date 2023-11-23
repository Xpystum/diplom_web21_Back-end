<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorites extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id');
    }
}
