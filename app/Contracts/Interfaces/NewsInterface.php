<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\ShowSlugInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\UpdateOrCreateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface NewsInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, ShowSlugInterface, SearchInterface, WhereInterface, WhereInInterface, CustomPaginationInterface, UpdateOrCreateInterface
{
    public function showWhithCount() : mixed;
    public function showCountMonth() : mixed;
    public function showNewsStatistic() : mixed;
    public function customPaginate2(Request $request, int $pagination = 10): LengthAwarePaginator;

    public function getAll() : mixed;
    public function getAllNews() : mixed;
    public function getByRight() : mixed;
    public function getByLeft() : mixed;
    public function getByMid() : mixed;
    public function getByPick() : mixed;
    public function getByGeneral() : mixed;
    public function getByPopular() : mixed;
    public function latest() : mixed;
    public function StatusBanned($author) : mixed;
    public function whereDate($date, $request) : mixed;

    public function searchStatus(mixed $id, Request $request) : mixed;
    public function searchAll(Request $request) : mixed;
}
