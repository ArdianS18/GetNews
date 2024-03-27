<?php

namespace App\Contracts\Interfaces\Eloquent;

interface ExistsInterface
{
    /**
     * Handle show method and delete data instantly from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */

    public function exists(array $conditions): bool;
}
