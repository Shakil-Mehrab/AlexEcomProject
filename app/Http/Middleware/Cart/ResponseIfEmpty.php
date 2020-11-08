<?php

namespace App\Http\Middleware\Cart;

use Closure;
use App\Cart\Cart;

class ResponseIfEmpty
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart=$cart;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->cart->isEmpty()){
            return response()->json([
                'message'=>'Cart is Empty'
            ],400);
        }
        return $next($request);
    }
}
