<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class subscription extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'type' => $this->type,
            'duration' => $this->duration,
            'price' => $this->price,
            'description' => $this->description

        ];
    }
}
