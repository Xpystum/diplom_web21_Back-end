<?php

namespace App\Models;

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

    
    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }
    public function model(): BelongsTo
    {
        return $this->belongsTo(Models::class, 'model_id');
    }




    // как объявить и функцию и фасад?
    /**
    * этот метотд выдаёт коллекцию реливантных и всех остальных продуктов
    *
    * @param Product $productsTarget ключевой продукт от которого строится запрос
    *
    * @return SupportCollection
    */
    public function productsRelevants(Product $productsTarget): SupportCollection
    {   
        //лоигка поиска реливантного товара
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

        $productRelevanceResult = $this->productAllMergeRelevants($productsRelevants, $productsTarget);
        return $productRelevanceResult;
    }

    /**
        * этот метотд выдаёт коллекцию реливантных и всех остальных продуктов
        *
        * @param SupportCollection $productsRelevants передаём реливантные продукты 
        * @param Product $productsTarget передаём ключевой продукт от которого строится поиск
        *
        * @return SupportCollection
        */
    private function productAllMergeRelevants(SupportCollection $productsRelevants, Product $productsTarget): SupportCollection
    {   
        // этот алгоритм выдаёт все остальные продукты кроме (ключевого и реливантных).
        $ProductsAll = DB::table('products')
        ->whereNotIn('id', $productsRelevants->map(function ($item) {   
            return $item->id;
        }))
        ->whereNotIn('id', [$productsTarget->id])
        ->limit(30 - $productsRelevants->count())
        ->orderByRaw(
            "CASE 
                WHEN mark = '{$productsTarget->mark}' THEN 1 
                Else 100 END ASC  
            "
        )
        ->get();

        //merge collection реливантных продуктов и всех остальных
        $productRelevanceResult = $productsRelevants->merge($ProductsAll);
 
        return $productRelevanceResult;
    }
}
