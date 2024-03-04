<?php

namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Http\Request;

interface WhereInterface
{
    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function where(Request $request): mixed;
}
