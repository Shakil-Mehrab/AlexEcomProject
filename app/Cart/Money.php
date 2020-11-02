<?php

namespace App\Cart;

use Money\Currency;
use NumberFormatter;
use Money\Money as BaseMoney;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;


class Money
{
    protected $money;
    public function __construct($value){
        $this->money=new BaseMoney($value,new Currency('GBP'));
    }
    //product variation a null price, origianal product price theke call kore.
    // so return $this->price!==$this->product->price kotha.but hoy na bole tokhon amount function call kore.
    // bul anount function amon ki return kore je ai problem solve holo
    public function amount(){
        return $this->money->getAmount();
    }
    public function formatted(){
        $formatter=new IntlMoneyFormatter(
            new NumberFormatter('en_GB',NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );
        return $formatter->format($this->money);
    }
}
