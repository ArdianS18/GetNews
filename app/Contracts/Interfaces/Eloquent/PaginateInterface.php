<?php

namespace App\Contracts\Interfaces\Eloquent;

interface PaginateInterface
{
    /**
     * Handle show method and delete data instantly from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */

    public function paginate(): mixed;
}
