<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\ShowSlugInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface SubCategoryInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, SearchInterface, PaginateInterface, ShowSlugInterface, WhereInterface, WhereInInterface,CustomPaginationInterface 
{

}
