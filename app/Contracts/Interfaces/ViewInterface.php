<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface ViewInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface
{
    public function showCountView() : mixed;
    public function trending() : mixed;
    public function where() : mixed;
    public function showNewsStatistic($user,Request $request) : mixed;

}
