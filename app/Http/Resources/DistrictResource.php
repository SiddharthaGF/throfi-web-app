<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\v1\DPA\ZoneController;
use App\Models\Zone;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
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
            'code_district' => $this->code_district,
            'name' => $this->name,
            'url_district' => route('district.show', $this->code_district),
            'zonees' => Zone::CodeDistrict($this->code_district)->get(),
        ];
    }
}
