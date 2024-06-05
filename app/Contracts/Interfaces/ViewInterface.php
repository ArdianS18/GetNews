<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteByAuthor;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface ViewInterface extends DeleteByAuthor,GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface
{
    public function showCountView($newsId) : mixed;
    public function trending() : mixed;
    public function where() : mixed;
    public function getByPopular($data) : mixed;
    public function getByLeft() : mixed;
    public function getByRight() : mixed;
    public function getByMid() : mixed;
    public function newsCategory($category) : mixed;
    public function newsCategorySearch($category, mixed $query, mixed $data, $hal) : mixed;

    public function newsStatistic() : mixed;
}
