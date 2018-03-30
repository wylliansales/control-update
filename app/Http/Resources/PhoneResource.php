<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            'name'          => $this->name,
            'phone'         => $this->phone,
            'observation'   => $this->observation,
            'created_at'    => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at'    => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
