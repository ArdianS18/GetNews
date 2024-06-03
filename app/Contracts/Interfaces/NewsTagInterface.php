<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteByAuthor;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;


interface NewsTagInterface extends DeleteByAuthor,GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, SearchInterface
{
    public function getNewsTags($news): array;
}
