<?php

namespace App\Http\Resources;

use Illuminate\Support\Collection;
use App\Http\Resources\ProductIndexResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->resource);
        if($this->resource instanceof Collection){
            return ProductVariationResource::collection($this->resource);
        }
        return[
            'id'=>$this->id, // id foreign key tai error dekhay.tai uporer if
            'name'=>$this->name,
            'price'=>$this->formattedPrice,  //hasprice er vitor **return new Money($value)** @@bt protteker alada@@
            'price_varies'=>$this->priceVaries(),
            'stock_count'=>(int)$this->stockCount(), //stockCount()->stock()->sum(pro_vari belongsTomany pro_vari_stick_view)
            'type'=>$this->type->name,
            'in_stock'=>$this->inStock(),
            'product'=>new ProductIndexResource($this->product),
        ];
    }
}
