<?php

namespace App\Scoping\Scopes;

use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class  CategoryScope implements Scope
{

    public function apply(Builder $builder,$value){
        return $builder->whereHas('categories',function($builder) use ($value){
            //use kivabe kaj kore.callback function bole kno
            // dd($value);
            // dd($builder);
            $builder->where('slug',$value);
        });
    }
}


//call back in this page
//implemens in this page
//array only on scoper
//scope apply
//has price
//App/cart/ Money
