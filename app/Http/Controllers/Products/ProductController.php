<?php

namespace App\Http\Controllers\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductIndexResource;
use App\Scoping\Scopes\CategoryScope;

class ProductController extends Controller
{
    public function index(){
        $products = Product::ordered()
                    ->with(['variations.stock'])
                    ->withScopes(
                        $this->scopes()
                    )
                    ->shakil(2);

        // with dara n+ problem solve hocche
        return ProductIndexResource::collection(
            $products
        );
    }
    public function show(Product $product){
        $product->load([
                'variations.type',
                'variations.stock',
                'variations.product'
                ]);// for n+

// return $product->variations;
        return new ProductResource(
                    $product
                );
    }
    protected function scopes(){
        return [
            'category'=>new CategoryScope()
        ];
    }

}
