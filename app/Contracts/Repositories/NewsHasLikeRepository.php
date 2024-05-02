<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\NewsHasLikeInterface;
use App\Models\NewsHasLike;

class NewsHasLikeRepository extends BaseRepository implements NewsHasLikeInterface
{
    public function __construct(NewsHasLike $newsHasLike)
    {
        $this->model = $newsHasLike;
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
            ->pluck('user_id');
    }

    public function where(mixed $id): mixed
    {
        return $this->model->query()
            ->where('news_id', $id)
            ->pluck('user_id');
    }

    public function deleteLike(mixed $id, $newsId): mixed
    {
        return $this->model->query()
            ->where('user_id', $id)
            ->where('news_id', $newsId)
            ->delete();
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

        //     $existingLike = $this->model->query()
        // ->where('news_id', $data['news_id'])
        // ->where('user_id', auth()->id())
        // ->first();

        // if ($existingLike) {
        //     $existingLike->status == 0 ? 1 : 0; // Toggle status
        //     $existingLike->save();
        //     return $existingLike;
        // } else {
        //     return $this->model->query()->create($data); // Buat baru dengan status 1 jika tidak ada
        // }
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
