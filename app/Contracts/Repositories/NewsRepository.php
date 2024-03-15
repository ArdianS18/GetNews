<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\NewsInterface;
use App\Enums\NewsStatusEnum;
use App\Models\News;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NewsRepository extends BaseRepository implements NewsInterface
{
    public function __construct(News $news)
    {
        $this->model = $news;
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

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->search,function($query) use ($request){
                $query->where('name','LIKE', '%'.$request->search.'%');
            })->when($request->status,function($query) use($request){
                $query->where('status','LIKE', '%'.$request->status.'%');
            })->when($request->category_id,function($query) use($request){
                $query->where('category_id',$request->category_id);
            })->when($request->sub_category_id,function($query) use($request){
                $query->where('sub_category_id',$request->sub_category_id);
            })->get();
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


    public function showWithSlug(string $slug): mixed
    {
        return $this->model->query()
            ->where(['slug' => $slug, 'status' => NewsStatusEnum::ACTIVE->value])
            ->with(['category', 'author'])
            ->firstOrFail();
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()->withCount('views')->orderBy('views_count','desc')
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

    public function where(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
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
