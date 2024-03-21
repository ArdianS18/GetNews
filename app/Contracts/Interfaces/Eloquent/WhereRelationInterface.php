<?php

namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Http\Request;

interface WhereRelationInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function whereRelation(): mixed;
}
