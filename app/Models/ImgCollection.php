<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImgCollection extends Model
{
    use HasFactory;

    protected $table = 'img_products';


    public function items(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
