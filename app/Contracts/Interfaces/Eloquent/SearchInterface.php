<?php

namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Http\Request;

interface SearchInterface
{
    /**
     * Handle get the specified data by id from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */

    public function search(Request $request): mixed;
}
