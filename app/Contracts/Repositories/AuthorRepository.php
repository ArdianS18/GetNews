<?php

namespace App\Contracts\Repositories;

use App\Models\User;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Contracts\Interfaces\AuthorInterface;
use App\Enums\UserStatusEnum;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class AuthorRepository extends BaseRepository implements AuthorInterface
{
    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function getAllWithUser()
    {
        return $this->model->query()
            ->get();
    }

    public function whereIn(mixed $data, mixed $banned, Request $request): mixed
    {
        return $this->model->query()
            ->where('status', $data)
            ->where('banned', $banned)
            ->when($request->search, function ($query) use ($request) {
                $query->join('users', 'authors.user_id', '=', 'users.id')
                    ->where('users.name', 'LIKE', '%' . $request->search . '%');
            })->when($request->status, function ($query) use ($request) {
                $query->where('status', 'LIKE', '%' . $request->status . '%');
            })->when($request->user_id, function ($query) use ($request) {
                $query->where('user_id', $request->user_id);
            })
            ->paginate(5);
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            // ->where('status', $data)
            ->when($request->search, function ($query) use ($request) {
                $query->join('users', 'authors.user_id', '=', 'users.id')
                    ->where('users.name', 'LIKE', '%' . $request->search . '%');
            })->when($request->status, function ($query) use ($request) {
                $query->where('status', 'LIKE', '%' . $request->status . '%');
            })->when($request->user_id, function ($query) use ($request) {
                $query->where('user_id', $request->user_id);
            })
            ->paginate(5);
    }

    public function paginate(): mixed
    {
        return $this->model->query()
            ->latest()
            ->paginate(5);
    }

    /**
     * Handle show method and delete data instantly from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }

    /**
     * Handle get the specified data by id from models.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    /**
     * Handle store data event to models.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * Handle show method and update data instantly from models.
     *
     * @param mixed $id
     * @param array $data
     *
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }

    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->where('status', "!=", UserStatusEnum::PANDING->value)
            ->when($request->author, function ($query) use ($request) {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->author . '%');
                });
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->fastPaginate($pagination);
    }


    public function customPaginate2(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->where('status', "===", UserStatusEnum::PANDING->value)
            ->when($request->name, function ($query) use ($request) {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->name . '%');
                });
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->fastPaginate($pagination);
    }

    public function showWhithCount(): mixed
    {
        return DB::table('authors')
            ->join('news', 'authors.id', '=', 'news.author_id')
            ->join('users', 'authors.user_id', '=', 'users.id')
            ->select('authors.id', 'users.name', 'users.photo', DB::raw('COUNT(*) as count'))
            ->groupBy('authors.id', 'users.name')
            ->get();
    }
}
