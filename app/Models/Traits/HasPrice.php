<?php

namespace App\Models\Traits;

use App\Cart\Money;
use NumberFormatter;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;


trait HasPrice
{
    public function getPriceAttribute($value){
        // dd($value);
        return new Money($value);//600 how the prameter come????????????????????
    }
    public function getFormattedPriceAttribute(){
        // dd($this->price);
       return $this->price->formatted();//600+GBP
    }
}
