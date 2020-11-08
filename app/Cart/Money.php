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
    public function __construct($value){ //product variation price =$value  ??? Cart subtotal flow koro .$value ase kivabe

        $this->money=new BaseMoney($value,new Currency('BDT'));//USD,GBP
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
    // for total = sobtotal + Shipping
    public function add(Money $money){
        $this->money=$this->money->add($money->instance());
        return $this;
    }
    public function instance(){
        return $this->money;
    }
}
