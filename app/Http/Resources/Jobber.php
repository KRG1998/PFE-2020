<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Jobber extends JsonResource
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
            'description' => $this->description,
            'address' => $this->address,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'phone' => $this->phone,
            'photo' => $this->photo,
            ];
    }
}
