<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name'=>$this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock,
            'discount'=>$this->discount,
            'totalPrice'=>round((1-($this->discount/100))*$this->price,2), //23/100=.23 then 1-.23=.77 then .77*475=365.75
            //'rating'=>round($this->reviews->sum('star') / $this->reviews->count()), //avg=sum/total
            'rating'=>$this->reviews->count()>0 ? round($this->reviews->sum('star') / $this->reviews->count(),2): 'No rating yet',
            'href'=>[
                'reviews'=> route('reviews.index',$this->id)
            ]
        ];
    }
}
