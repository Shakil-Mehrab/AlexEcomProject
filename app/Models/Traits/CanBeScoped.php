<?php

namespace App\Models\Traits;

use App\Scoping\Scoper;
use Illuminate\Database\Eloquent\Builder;

trait CanBeScoped
{
    public function scopeWithScopes(Builder $builder,$scopes=[]){
        // dd($builder);
        // dd($scopes);
        // dd(request());
        return (new Scoper(request()))->apply($builder,$scopes);
    }
}
