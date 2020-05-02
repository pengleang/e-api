<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'sponsor'=>$this->sponsor,
            'price'=>$this->price,
            'duration'=>$this->duration,
            'start'=>$this->start,
            'finish'=>$this->finish,
            'href'=>['owners'=>route('owners.index',$this->id)]
        ];
    }
}
