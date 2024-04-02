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
          'author_id' => $this->author->user->id,
          'name' => $this->name,
          'author_name' => $this->author->user->name,
          'email' => $this->author->user->email,
          'photo' =>$this->photo,
          'content' => $this->content,
          'upload_date' => Carbon::parse($this->upload_date)->isoFormat('D MMMM Y'),
          'status' => $this->status
        ];
    }
}
