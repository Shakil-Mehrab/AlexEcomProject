<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\Traits\HasPrice;
use App\Models\ProductVariationType;
use Illuminate\Database\Eloquent\Model;

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
        return $this->stock->sum('pivot.stock'); //why sum
    }
    public function type(){
        return $this->hasOne(ProductVariationType::class,'id','product_variation_type_id');//id foreign key kivabe
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function stocks(){
        return $this->hasMany(Stock::class);
    }
    public function stock(){
        return $this->belongsToMany(
            ProductVariation::class,'product_variation_stock_view'  ///product variation asbe
            )->withPivot([  ///product variation table er part noy tai pivot niye neya
                'stock',
                'in_stock'
                ]);
    }
}
