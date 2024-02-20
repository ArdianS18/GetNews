<?php

namespace App\Contracts\Interfaces\Eloquent;

interface SearchInterface
{
    /**
     * Handle get the specified data by id from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */

    public function search($query): mixed;
}
