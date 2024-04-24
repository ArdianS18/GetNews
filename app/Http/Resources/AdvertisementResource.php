<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'user_id' => $this->user->id,
            'type' => $this->type,
            'page' => $this->page,
            'start_date' => Carbon::parse($this->start_date)->isoFormat('D MMMM Y'),
            'end_date' => Carbon::parse($this->end_date)->isoFormat('D MMMM Y'),
            'url' => $this->url,
            'status' => $this->status
          ];
    }
}
