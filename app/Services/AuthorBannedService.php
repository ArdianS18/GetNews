<?php

namespace App\Services;

use App\Models\Author;

class AuthorBannedService
{
    public function banned(Author $author)
    {
        $author->update([
            'banned' => true,
            'status' => 'reject'
        ]);
        
    }

    public function unBanned(Author $author)
    {
        $author->update([
            'banned' => false,
            'status' => 'approved'
        ]);
        
    }
}
