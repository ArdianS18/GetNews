<?php

namespace App\Services;

use App\Models\User;

class AuthorBannedService
{
    public function banned(User $user)
    {
        $user->update([
            'banned' => true,
            'status' => 'reject'
        ]);
        
    }

    public function unBanned(User $user)
    {
        $user->update([
            'banned' => false,
            'status' => 'approved'
        ]);
        
    }
}
