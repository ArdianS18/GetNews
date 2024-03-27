<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetidbyNameInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function getIdsByName(array $tagNames): array;
}
