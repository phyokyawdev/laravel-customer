<?php

namespace App\Http\Resources;

class CustomerResource extends SuccessResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [            
            'id' => $this->id,
            'name' => $this->name,
            'phone_no' => $this->phone_no,
            'city_id' => $this->city_id,
            'zone_id' => $this->zone_id,
            'address' => $this->address,
        ];
    }
}
