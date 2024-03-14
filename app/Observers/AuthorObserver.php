<?php

namespace App\Observers;

use App\Models\Author;
use Faker\Provider\Uuid;

class AuthorObserver
{
        /**
     * Handle the User "creating" event.
     *
     * @param User $user
     * @return void
     */
    public function creating(Author $author): void
    {
        $author->id = Uuid::uuid();
    }
}
