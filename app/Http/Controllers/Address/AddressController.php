<?php

namespace App\Http\Controllers\Address;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Requests\Adresses\AddressStoreRequest;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }
    public function index(Request $request){
        // return 'address';
        return AddressResource::collection(
           $request->user()->addresses
        );
    }
    public function store(AddressStoreRequest $request){
        // return 'ok';
        // $address=Address::make($request->only([
        //     'name','address_1','city','postal_code','country_id'
        // ]));
        // if(!empty($request->default)){
        //     $default=$request->default;
        // }else{$default=0;}
        $address=new Address();
        $address->name=$request->name;
        $address->address_1=$request->address_1;
        $address->city=$request->city;
        $address->postal_code=$request->postal_code;
        $address->country_id=$request->country_id;
        $address->default=$request->default;
        $request->user()->addresses()->save($address);
        return new AddressResource(
            $address
         );
    }
}
