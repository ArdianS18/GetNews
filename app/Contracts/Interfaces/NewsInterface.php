<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteByAuthor;
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

interface NewsInterface extends DeleteByAuthor, GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, ShowSlugInterface, SearchInterface, WhereInterface, WhereInInterface, CustomPaginationInterface, UpdateOrCreateInterface
{
    public function newsPremium() : mixed;
    public function manyNews($id) : mixed;

    public function showWhithCount() : mixed;
    public function showWhithCountStat() : mixed;
    public function showCountMonth() : mixed;

    public function showCountMonthPremium() : mixed;
    public function showNewsStatistic() : mixed;
    public function customPaginate2(Request $request, int $pagination = 10): LengthAwarePaginator;

    public function authorGetNews($user, Request $request) : mixed;
    public function getAll() : mixed;
    public function getAllNews() : mixed;
    public function getByRight() : mixed;
    public function getByLeft() : mixed;
    public function getByMid() : mixed;
    public function getByPick() : mixed;
    public function getByGeneral() : mixed;
    public function getByPopular($data) : mixed;

    public function getPremium(Request $request) : mixed;

    public function latest() : mixed;
    public function latest2() : mixed;
    public function StatusBanned($author) : mixed;
    public function whereDate($request, $data) : mixed;

    public function getById($category_id) : mixed;

    public function searchStatus(mixed $id, Request $request,int $pagination, $condition) : LengthAwarePaginator;
    public function searchAll(Request $request) : mixed;

    public function findBySlug($slug): mixed;

    public function newsCategory($category) : mixed;
    public function newsCategorySearch($category, mixed $query, mixed $data, $hal) : mixed;
    public function newsLiked($id, Request $request);

    public function newsSubCategory($subCategory) : mixed;
    public function newsSubCategorySearch($subCategory, mixed $query, mixed $data, $hal) : mixed;

    public function findUser(mixed $user_id) : mixed;
}
