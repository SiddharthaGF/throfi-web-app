<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'full_name' => $this->last_name.' '.$this->name,
            'birthdate' => $this->birthdate,
            'city' => $this->city,
            'profile_photo' => $this->profile_photo,
            'url' =>  route('patient.show', $this->id),
        ];
    }
}
