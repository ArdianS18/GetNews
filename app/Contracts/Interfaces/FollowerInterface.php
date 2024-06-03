<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteByAuthor;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface FollowerInterface extends DeleteByAuthor, GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, WhereInterface
{
    public function destroy(mixed $id,$user_id) : mixed;
    public function whereUser($user_id) : mixed;
    public function whereIn($user_id,$author_id) : mixed;
    public function whereAuthor($author_id) : mixed;
}
