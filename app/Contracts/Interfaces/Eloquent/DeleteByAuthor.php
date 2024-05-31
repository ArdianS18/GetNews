<?php

namespace App\Contracts\Interfaces\Eloquent;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface DeleteByAuthor
{
    /**
     * Handle paginate data event from models.
     *
     * @param Request $request
     * @param int $pagination
     *
     * @return LengthAwarePaginator
     */

    public function deleteByAuthor(Author $author): mixed;
}
