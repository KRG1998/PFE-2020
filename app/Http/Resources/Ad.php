<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ad extends JsonResource
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
        'id' =>$this->id,
        'client_id' => $this->client_id ,
        'title' => $this->title ,
        'category' =>  $this->category, 
        'subcategory' =>  $this->subcategory,
        'description' =>  $this->description,
        'jobbers_number' =>  $this->jobbers_number,
        'photos'=> $this->photos,
        'date' =>  $this->date,
        'hour'  =>  $this->hour,
        'address' => $this-> address,
        'phone' => $this-> phone,
        'duration' =>  $this->duration,
        'hour_wage' => $this->hour_wage ,
        'amount' => $this->amount ,
        'state' => $this->state,
        'deleted_at'=> $this->deleted_at,
        ];
    }
    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'api_url' => url('http://127.0.0.1/api')
        ];
    }
}
