<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;



class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }
    public function model(): BelongsTo
    {
        return $this->belongsTo(Models::class, 'model_id');
    }
    public function body_type(): BelongsTo
    {
        return $this->belongsTo(BodyType::class, 'body_type_id');
    }
    public function fuel(): BelongsTo
    {
        return $this->belongsTo(Fuel::class, 'fuel_id');
    }
    public function transmission(): BelongsTo
    {
        return $this->belongsTo(Transmission::class, 'transmission_id');
    }
    public function drive_unit(): BelongsTo
    {
        return $this->belongsTo(DriveUnit::class, 'drive_unit_id');
    }

    public function review_img_collection(): HasMany
    {
        return $this->hasMany(ReviewImgCollection::class, 'review_id');
    }

   
}

