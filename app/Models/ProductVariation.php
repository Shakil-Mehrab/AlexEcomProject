<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\Traits\HasPrice;
use App\Models\ProductVariationType;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collections\ProductVariationCollection;

class ProductVariation extends Model
{
    use HasPrice;
    public function getPriceAttribute($value){ ///over write if product variation price is null
        if($value===null){
           return  $this->product->price;
        }
        return new Money($value);
    }
    public function minStock($count){
        return min($this->stockCount(),$count);
    }
    public function priceVaries(){
        return $this->price->amount()!==$this->product->price->amount();
    }
    public function inStock(){
        return $this->stockCount()>0;
    }
    public function stockCount(){
        // dump($this->stock->sum('pivot.stock'));
        return $this->stock->sum('pivot.stock');//cart_user er protteker jonno pro_vari*Pro_vari_stock_view bar call hove
    }
    public function type(){
        return $this->hasOne(ProductVariationType::class,'id','product_variation_type_id');//id ProductVariationType er.ja pro_vari er jonno foreign key
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function stocks(){
        return $this->hasMany(Stock::class);
    }
    public function stock(){
    //jodi product_variation_stock thakto tahole return $this->belongsToMany(Stock::class) dilei hoto
        return $this->belongsToMany(
            ProductVariation::class,'product_variation_stock_view'  ///product variation asbe.mirror tai stock r ekti table ja connected
            )->withPivot([  //product_variation_stock_view theke stock and in_stock
                'stock',
                'in_stock'
            ]);
    }
    public function newCollection(array $models = [])
    {
        return new ProductVariationCollection($models);
    }
}
