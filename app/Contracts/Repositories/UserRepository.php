<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CommentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
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

    public function whereRelation(): mixed
    {
        //
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

    public function search(Request $request): mixed
    {
        return $this->model->query()
        ->when($request->search,function($query) use ($request){
            $query->where('name','LIKE', '%'.$request->search.'%');
        })->when($request->status,function($query) use($request){
            $query->where('status','LIKE', '%'.$request->status.'%');
        })->when($request->sub_category_id,function($query) use($request){
            $query->where('sub_category_id',$request->sub_category_id);
        })->get();
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
