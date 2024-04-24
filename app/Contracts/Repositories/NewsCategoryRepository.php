<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Enums\NewsStatusEnum;
use App\Models\NewsCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                $search->where('status',NewsStatusEnum::ACTIVE->value);
                $search->where('name', 'LIKE', '%'.$query.'%');
        })->paginate(10);
    }

    public function searchAuthor(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->whereHas('news', function($findid) use ($id){
                $findid->where('author_id', $id);
            })
            ->whereHas('news', function($findid) use ($request) {
                $findid->where('status', "active");
                $findid->when($request->search, function($query) use ($request){
                    $query->where('name', 'LIKE', '%'.$request->search.'%');
                });
            })
            ->when($request->opsilatest, function($query) use ($request){
                $query->when($request->opsilatest === 'terbaru', function ($terbaru) {
                    $terbaru->latest()->get();
                });

                $query->when($request->opsilatest === 'terlama', function ($terlama) {
                    $terlama->oldest()->get();
                });
            })
            ->when($request->perpage, function ($query) use ($request) {
              $query->take($request->perpage);
            })
            ->paginate(10);
    }

    public function searchStatus(mixed $id, Request $request): mixed
    {
        return $this->model->query()
        ->whereHas('news', function($findid) use ($id){
            $findid->where('author_id', $id);
        })
        ->whereHas('news', function($findid) use ($request) {
            $findid->when($request->search, function($query) use ($request){
                $query->where('name', 'LIKE', '%'.$request->search.'%');
            });
        })
        ->whereHas('news', function ($findid) use ($request) {
            $findid ->when($request->stat, function ($query) use ($request){
                $query->when($request->stat === 'panding', function ($var) {
                    $var->where('status', 'panding');
                });
                $query->when($request->stat === 'active', function ($var) {
                    $var->where('status', 'active');
                });
                $query->when($request->stat === 'nonactive', function ($var) {
                    $var->where('status', 'nonactive');
                });
            });
        })
        ->get();
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

    public function trending(): mixed
    {
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::now()->addDays(10)->toDateString();

        return $this->model->query()
        ->select('news_id', DB::raw('COUNT(*) as total'))
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('news_id')
        ->orderBy('total', 'desc')
        ->limit(9)
        ->get();
    }
}
