<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryRepository extends BaseRepository implements NewsCategoryInterface
{
    public function __construct(NewsCategory $newsCategory)
    {
        $this->model = $newsCategory;
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

    public function search(mixed $id, mixed $query): mixed
    {
        return $this->model->query()
            ->where('category_id', $id)
            ->whereHas('news', function($search) use ($query){
            $search->where('name', 'LIKE', '%'.$query.'%');
        })->paginate(10);
    }

    public function updateOrCreate(array $data): mixed
    {
        return $this->model->query()
        ->updateOrCreate([
            'news_id' => $data['news_id'],
            'category_id' => $data['category_id']
        ],$data);
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
