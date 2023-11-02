<?php
namespace App\Action;

class FilterModel
{
    public function handle($params, $Model){

        /**
        * Action для фильтрации ORM и вывода в массив
        *
        * @param $params параметр например request->alias
        * @param $Model модель ORM
        * @return Array
        */
        if($params == null){
            return $Model::get();
        }

        $products = $Model::all()->filter(function ($Model)  use ($params){
            return $Model->category->alias == $params;
        })->map(function ($Model) {
            return $Model;
        })->sortBy('id')->toArray();

        $data = [];
        foreach($products as $product){
            $data[] = $product;
        }

        return $data;
        
    }
}