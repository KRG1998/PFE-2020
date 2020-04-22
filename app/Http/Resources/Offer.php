<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Offer extends JsonResource
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
            'ad_id'=> $this->ad_id,
            'client_id' => $this->client_id,
            'title'=>$this->title,
            'description' => $this->description,
            'duration' =>$this->duration,
            'amount'=> $this->amount,
            'state' =>$this->state,
            'cover_letter' =>$this->cover_letter
            ];
    }
}
