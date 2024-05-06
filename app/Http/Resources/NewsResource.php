<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
          'author_id' => $this->user->id,
          'name' => $this->name,
          'author_name' => $this->user->name,
          'email' => $this->user->email,
          'photo' =>$this->photo,
          'content' => $this->content,
          'pin'=>$this->is_primary,
          'upload_date' => Carbon::parse($this->upload_date)->isoFormat('D MMMM Y'),
          'status' => $this->status
        ];
    }
}
