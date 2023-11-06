<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryProducts::class, 'category_id');
    }

    // как объявить и функцию и фасад?
    public static function productsRelevants(Product $productsTarget): SupportCollection
    {
        $productsRelevants = DB::table('products')
        ->whereNotIn('id', [$productsTarget->id])
        ->where(function (Builder $query) use ($productsTarget) {
            $query->where('mark', '=' , $productsTarget->mark);
        })
        ->where(function (Builder $query) use ($productsTarget) {

            $query->where('year', '=' , $productsTarget->year)
            ->orWhere(function (Builder $query) use ($productsTarget) {
                $query->whereBetween('year', [$productsTarget->year - 8, $productsTarget->year + 8]);
            });

        })
        ->where(function (Builder $query) use ($productsTarget) {

            $query->whereBetween('price', [$productsTarget->price - 2000000, $productsTarget->price + 2000000])
            ->orWhere(function (Builder $query) use ($productsTarget) {
                $query->whereBetween('price', [0, $productsTarget->price + 8000000]);
            });

        })->get(); 

        return $productsRelevants;
    }
}
