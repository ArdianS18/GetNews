<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CommentInterface;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CommentRepository extends BaseRepository implements CommentInterface
{
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
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

    public function where(mixed $id): mixed
    {
        return $this->model->query()
            ->whereIn('news_id', $id)
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
