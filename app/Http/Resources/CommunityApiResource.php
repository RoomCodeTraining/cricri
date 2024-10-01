<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CityApiResource;
use App\Http\Resources\MunicipalityApiResource;

class CommunityApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'president_id' => $this->president_id,
            'name' => $this->name,
            'sigle' => $this->sigle,
            'description' => $this->description,
            'history' => $this->history,
            'location' => $this->location,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'city' => new CityApiResource($this->whenLoaded('city')),
            'municipality' => new MunicipalityApiResource($this->whenLoaded('municipality')),
        ];
    }
}
