<?php

namespace App\Models\Traits;

use App\Cart\Money;

trait HasPrice
{
    public function getPriceAttribute($value){
        // dd($value);
        return new Money($value);//600 how the prameter come????????????????????
    }
    public function getFormattedPriceAttribute(){
       return $this->price->formatted();//600+GBP
    }
}
