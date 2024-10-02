<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "uuid" => $this->uuid,
            "email" => $this->email,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "phone" => $this->phone,
            "address" => $this->address,
            "name" => $this->name,
            "updated_at" => $this->updated_at->toISOString(),
            "created_at" => $this->created_at->toISOString(),
            "municipality" => new MunicipalityApiResource($this->whenLoaded('municipality')),
        ];
    }
}
