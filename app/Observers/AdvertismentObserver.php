<?php

namespace App\Observers;

use App\Models\Advertisement;
use App\Models\Author;
use Faker\Provider\Uuid;

class AdvertismentObserver
{
        /**
     * Handle the User "creating" event.
     *
     * @param User $user
     * @return void
     */
    public function creating(Advertisement $advertisement): void
    {
        $advertisement->id = Uuid::uuid();
    }
}
