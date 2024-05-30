<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\UpdateOrCreateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface AuthorInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, SearchInterface, PaginateInterface, WhereInInterface, WhereInterface
{
    public function customPaginate2(Request $request, int $pagination = 10): LengthAwarePaginator;
    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator;
    public function showWhithCount() : mixed;
    public function showWhithCountSearch(Request $request) : mixed;

    public function whereEmail($authorId): mixed;

    public function updateOrCreate($userId,array $data): mixed;
}
