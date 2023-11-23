<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
    public function drive_unit(): BelongsTo
    {
        return $this->belongsTo(DriveUnit::class, 'drive_unit_id');
    }
    public function transmission(): BelongsTo
    {
        return $this->belongsTo(Transmission::class, 'transmission_id');
    }
    public function body_type(): BelongsTo
    {
        return $this->belongsTo(BodyType::class, 'body_type_id');
    }
    public function fuel(): BelongsTo
    {
        return $this->belongsTo(Fuel::class, 'fuel_id');
    }


    public function imgCollection(): HasMany
    {
        return $this->hasMany(ImgCollection::class, 'product_id');
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
        ->select('products.*','brands.name as brand_name','models.name as model_name')->from('products')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('models', 'products.model_id', '=', 'models.id')
        ->whereNotIn('products.id', [$productsTarget->id])
        ->where(function (Builder $query) use ($productsTarget) {
            $query->where('brands.name', '=' , $productsTarget->brand->name);
        })
        ->where(function (Builder $query) use ($productsTarget) {

            $query->where('year', '=' , $productsTarget->year)
            ->orWhere(function (Builder $query) use ($productsTarget) {
                $query->whereBetween('year', [$productsTarget->year - ($productsTarget->year - $query->min('year')), 
                $productsTarget->year + ($query->max('year') - $productsTarget->year)]); });
        })
        ->where(function (Builder $query) use ($productsTarget) {

            $query->whereBetween('price', [$productsTarget->price - ($productsTarget->price - $query->min('price')), $productsTarget->price +  ($query->max('price') - $productsTarget->price)]);

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
        ->select('products.*','brands.name as brand_name','models.name as model_name')->from('products')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('models', 'products.model_id', '=', 'models.id')
        ->whereNotIn('products.id', $productsRelevants->map(function ($item) { 
            return $item->id;
        }))
        ->whereNotIn('products.id', [$productsTarget->id])
        ->limit(30 - $productsRelevants->count())
        ->orderByRaw(
            "CASE 
                WHEN brands.name = '{$productsTarget->mark}' THEN 1 
                Else 100 END ASC  
            "
        )
        ->get();

        //merge collection реливантных продуктов и всех остальных
        $productRelevanceResult = $productsRelevants->merge($ProductsAll);
 
        return $productRelevanceResult;
    }

    public function Favorites(): HasMany
    {
        return $this->hasMany(Favorites::class, 'product_id');
    }
}
