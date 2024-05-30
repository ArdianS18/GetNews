<?php

namespace App\Services;

use App\Models\User;
use App\Models\Author;

class AuthorBannedService
{
    public function banned(User $user)
    {
        $user->status_banned = 1;
        $user->save();

        if ($user->author) {
            $author = Author::find($user->author->id);
            if ($author) {
                $author->status = 'reject';
                $author->save();
            }
        }

    }

    public function unBanned(User $user)
    {
        $user->status_banned = 0;
        $user->save();
        if ($user->author) {
            $author = Author::find($user->author->id);
            if ($author) {
                $author->status = 'approved';
                $author->save();
            }
        }
    }

    public function delete(User $user)
    {
        $user->roles()->detach();
        $user->permissions()->detach();
    }
}
