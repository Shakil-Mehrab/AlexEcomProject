<?php

namespace App\Scoping;

use Illuminate\Http\Request;
use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class Scoper
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request=$request;
        // dd($this->request->all()); //category=tshirt  dekahy
    }
    public function apply(Builder $builder,array $scopes){
        // dd($scopes);  //"category" => App\Scoping\Scopes\CategoryScope

        foreach($this->limitScopes($scopes) as $key=>$scope){ //ekhane $scopes dile hoto.tokhn filtering word na dile products url empty dekhato.
            if(!$scope instanceof Scope){
                continue;
            }
            $scope->apply($builder,$this->request->get($key));
            // dd($this->request->get($key)); //category=tshirt tshirt only vlaue dekahy
            // dd($scope); //App\Scoping\Scopes\CategoryScope dekhay
            // dd($key); //category dekhay
        }
        return $builder;
    }
    protected function limitScopes(array $scopes){
        return array_only(//array only???????????????????????
            $scopes,
            array_keys($this->request->all())
        //    dd(array_keys($this->request->all())) //0=>category 1=>page

        );
    }
}
