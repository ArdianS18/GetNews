<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TagInterface;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagRepository extends BaseRepository implements TagInterface
{
    public function __construct(Tag $tag)
    {
        $this->model = $tag;
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


    public function paginate(): mixed
    {
        return $this->model->query()
            ->latest()
            ->paginate(5);
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

    public function search(mixed $query): mixed
    {
        return $this->model->where('name','LIKE', '%'.$query.'%')->paginate(5);
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

    public function updateOrCreate(array $data, array $values = []): mixed
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
}
