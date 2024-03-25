<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AuthorInterface;
use App\Models\Author;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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
            ->when($request->search,function($query) use ($request){
                $query->join('users', 'authors.user_id', '=', 'users.id')
                    ->where('users.name','LIKE', '%'.$request->search.'%');
            })->when($request->status,function($query) use($request){
                $query->where('status','LIKE', '%'.$request->status.'%');
            })->when($request->user_id,function($query) use($request){
                $query->where('user_id',$request->user_id);
            })
            ->paginate(5);
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
        // ->where('status', $data)
        ->when($request->search,function($query) use ($request){
            $query->join('users', 'authors.user_id', '=', 'users.id')
                ->where('users.name','LIKE', '%'.$request->search.'%');
        })->when($request->status,function($query) use($request){
            $query->where('status','LIKE', '%'.$request->status.'%');
        })->when($request->user_id,function($query) use($request){
            $query->where('user_id',$request->user_id);
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
}
