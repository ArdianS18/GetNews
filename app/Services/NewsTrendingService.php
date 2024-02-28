<?php

namespace App\Services;

use App\Models\News;

class NewsTrendingService
{
    public function markAsTrending(News $news)
    {
        $news->update([
            'is_primary' => true,
            'status' => 'primary',
        ]);
    }

    public function markAsNotTrending(News $news)
    {
        $news->update([
            'is_primary' => false,
        ]);
    }
}
