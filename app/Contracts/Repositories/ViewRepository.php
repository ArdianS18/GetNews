<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ViewInterface;
use App\Models\View;
use Illuminate\Database\QueryException;

class ViewRepository extends BaseRepository implements ViewInterface
{
    public function __construct(View $view)
    {
        $this->model = $view;
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
    public function store(array $data, array $values = []): mixed
    {
        return $this->model->query()
            ->UpdateOrCreate($data, $values);
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

    public function showCountView(): mixed
    {
        
    }
}
