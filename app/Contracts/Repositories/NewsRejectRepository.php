<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\NewsRejectInterface;
use App\Models\NewsReject;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NewsRejectRepository extends BaseRepository implements NewsRejectInterface
{
    public function __construct(NewsReject $newsReject)
    {
        $this->model = $newsReject;
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
        //
    }

    public function where(mixed $id): mixed
    {
        return $this->model->query()
            ->whereHas('news', function($query) use ($id){
                $query->where('user_id', $id);
            })
            ->get();
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
