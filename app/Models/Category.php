<?php

namespace App\Models;

use App\Models\Traits\HasChildren;
use App\Models\Traits\isOrderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasChildren,isOrderable;
    public function children(){
       return $this->hasMany(Category::class,'parent_id','id');
    }
    public function products(){
       return $this->belongsToMany(Product::class);
    }
}
