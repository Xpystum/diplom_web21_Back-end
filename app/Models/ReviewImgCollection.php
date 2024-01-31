<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReviewImgCollection extends Model
{
    use HasFactory;

    public $table = 'img_reviews';


    public function review_img_collection(): BelongsTo
    {
        return $this->belongsTo(Review::class, 'review_id');
    }
}
