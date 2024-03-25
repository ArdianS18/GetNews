<?php

namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Http\Request;

interface WhereInInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function whereIn(mixed $data, mixed $banned,Request $request): mixed;
}
