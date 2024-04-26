<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\FollowerInterface;
use App\Models\ContactUs;
use App\Models\Followers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FollowerRepository extends BaseRepository implements FollowerInterface
{
    public function __construct(Followers $followers)
    {
        $this->model = $followers;
    }

    public function getAllWithUser()
    {
        return $this->model->query()
            ->get();
    }

    public function where(Request $request): mixed
    {
        return $this->model->whereIn('status_delete', $request)->get();
    }

    public function whereIn($user_id, $author_id): mixed
    {
        return $this->model->query()
            ->where('user_id', $user_id)
            ->where('author_id', $author_id)
            ->get();
    }

    public function whereAuthor($author_id): mixed
    {
        return $this->model->query()
            ->where('author_id', $author_id)
            ->get();
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

    public function destroy(mixed $id, $user_id): mixed
    {
        return $this->model->query()
            ->where('author_id', $id)
            ->where('user_id', $user_id)
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
            ->latest()
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
