<?php

namespace App\Services;

use App\Models\NewsHasLike;

class NewsLikeStatusService
{
    public function like(NewsHasLike $news)
    {
        $news->update([
            'status' => true,
        ]);
    }

    public function unLike(NewsHasLike $news)
    {
        $news->update([
            'status' => false,
        ]);
    }
}
