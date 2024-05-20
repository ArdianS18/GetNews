<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface AdvertisementInterface extends GetInterface,StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, SearchInterface, CustomPaginationInterface
{
    public function where($id) : mixed;
    public function customPaginate2(Request $request, int $pagination = 10): LengthAwarePaginator;
}
