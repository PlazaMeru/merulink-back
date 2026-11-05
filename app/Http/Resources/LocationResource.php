<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'key' => $this->key,
            'area' => $this->area,
            'floor' => $this->floor,
            'referencePoint' => $this->reference_point,
            'eventsCount' => $this->when(isset($this->events_count), $this->events_count),
        ];
    }
}
