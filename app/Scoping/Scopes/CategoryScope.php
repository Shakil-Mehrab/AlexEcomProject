<?php

namespace App\Scoping\Scopes;

use App\Scoping\Contracts\Scope;
use Barryvdh\Debugbar\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class  CategoryScope implements Scope
{

    public function apply(Builder $builder,$value){
        return $builder->whereHas('categories',function($builder) use ($value){
            // dd($value);//?category=food  ekhane $value=foof
            $builder->where('slug',$value);
        });
    }
}






//has price
//App/cart/ Money $value
//Address model a setDefaultAttribute

//$this ki StripeGateway te

