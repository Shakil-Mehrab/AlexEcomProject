<?php

namespace App\Models\Traits;

use App\Scoping\Scoper;
use Illuminate\Database\Eloquent\Builder;

trait CanBeScoped
{
    public function scopeWithScopes(Builder $builder,$scopes=[]){
        // $scopes = array:1 [
        //     "category" => App\Scoping\Scopes\CategoryScope
        //   ]
        return (new Scoper(request()))->apply($builder,$scopes);
    }
}
