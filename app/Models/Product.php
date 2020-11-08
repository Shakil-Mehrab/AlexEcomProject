<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Traits\HasPrice;
use App\Models\ProductVariation;
use App\Models\Traits\CanBeScoped;
use App\Models\Traits\isOrderable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use CanBeScoped,HasPrice,isOrderable;

    public function getRouteKeyName(){
        return 'slug';
    }

    public function scopeShakil($query, $page=5) //$products array variable.Ehkane builder jorito thake.So kono function likhle scope thakbe
    {
        return $query->paginate($page);
    }
    // public function scopeShakil(Builder $builder, $page=5) //etao hoy
    // {
    //     return $builder->paginate($page);
    // }
    public function categories(){
        return $this->belongsToMany(Category::class);//class import kora lGE NI
    }
    //bujhi nai
    public function stockCount(){
        return $this->variations   //1kg 300ti,2kg er 200ti
        ->sum(function($variation){  //eta ki foreach er moto
            return $variation->stockCount();
        });
    }
    public function variations(){
        return $this->hasMany(ProductVariation::class)->orderBy('order','asc');
    }
}
