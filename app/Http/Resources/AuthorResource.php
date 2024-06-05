<?php

namespace App\Http\Resources;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'user_id' => $this->user->id,
            'name' => $this->user->name,
            'email' => $this->user->email,  
            'phone_number' => $this->user->phone_number,
            'status' => $this->user->status_banned,
            'photo' => $this->user->photo ? asset('storage/' . $this->user->photo) : asset('default.png'),
            'birth_date' => $this->user->birth_date ? $this->user->birth_date : "-",
            'address' => $this->user->address,
            'cv' => $this->cv ? asset('storage/' . $this->cv): asset(''),
        ];
    }
}
