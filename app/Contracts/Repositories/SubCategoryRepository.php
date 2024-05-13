<?php

namespace App\Contracts\Repositories;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Contracts\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Enums\NewsStatusEnum;

class SubCategoryRepository extends BaseRepository implements SubCategoryInterface
{
    public function __construct(SubCategory $subCategory)
    {
        $this->model = $subCategory;
    }

    public function whereIn(mixed $data, mixed $banned, Request $request): mixed
    {
        return $this->model->query()
        ->when($data, function($query) use($data){
            $query->where('name', 'Like', '%'.$data.'%');
        })->when($request->category_id, function($query) use ($request){
            $query->where('category_id',$request->category_id);
        })->paginate(5);
    }

    public function search(mixed $query): mixed
    {

        return $this->model->where('name', 'like', '%'.$query.'%')->paginate(5);

        // return $this->model->query()
        // ->when($request->name, function($query) use($request){
        //     $query->where('name', 'Like', '%'.$request->name.'%');
        // })->when($request->category_id, function($query) use ($request){
        //     $query->where('category_id',$request->category_id);
        // })->paginate(5);
    }

    public function paginate(): mixed
    {
        return $this->model->query()
            ->paginate(5);
    }

    public function showWithSlug(string $slug): mixed
    {
        return $this->model->query()
            ->where(['slug' => $slug])
            ->with(['category'])
            ->firstOrFail();
    }

    public function where(mixed $id): mixed
    {
        return $this->model->query()
            ->where('category_id', $id)
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

    public function get404(): mixed
    {
        return $this->model->query()
            ->whereRelation('news', 'status', NewsStatusEnum::ACTIVE->value)
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

    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
        ->where('category_id',$request->category)
        ->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' .  $request->name . '%');
        })
        ->fastPaginate($pagination);
    }
}
