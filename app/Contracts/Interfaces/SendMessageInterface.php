<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface SendMessageInterface extends StoreInterface, UpdateInterface, ShowInterface, DeleteInterface
{
    public function get($status) : mixed;
    public function count($data) : mixed;

}
