<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'customer'      => $this->customer->name,
            'product'       => $this->product->name,
            'observation'   => $this->observation,
            'blocked'       => $this->blocked,
            'created_at'    => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at'    => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
