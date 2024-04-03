<?php

namespace App\Contracts\Repositories;

use App\Models\News;

use Illuminate\Http\Request;
use Termwind\Components\Raw;
use App\Enums\NewsStatusEnum;
use App\Helpers\TenDaysHelper;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function whereIn(mixed $data, mixed $banned, Request $request): mixed
    {
        return $this->model->query()
            // ->where('status', $data)
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

    public function customPaginate2(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        $pagination = $request->perpage;
        return $this->model->query()
            ->where('status', "panding")
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' .  $request->name . '%');
            })
            ->when($request->latest, function ($query) use ($request) {
                $query->when($request->latest === 'terbaru' ,function ($terbaru){
                    $terbaru->latest()->get();
                });

                $query->when($request->latest === 'terlama' ,function ($terlama){
                    $terlama->oldest()->get();
                });
            })
            ->when($request->perpage, function($query) use ($request){
                $query->when($request->perpage === '10' ,function ($var){
                    $var->take(10);
                });
                $query->when($request->perpage === '20' ,function ($var){
                    $var->take(20);
                });
                $query->when($request->perpage === '50' ,function ($var){
                    $var->take(50);
                });
                $query->when($request->perpage === '100' ,function ($var){
                    $var->take(100);
                });
            })
            ->fastPaginate($pagination);
    }

    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        $pagination = $request->perpage;
        return $this->model->query()
            ->where('status', "active")
            ->when($request->category, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' .  $request->category . '%');
            })
            ->when($request->latest, function ($query) use ($request) {
                $query->when($request->latest === 'terbaru' ,function ($terbaru){
                    $terbaru->latest()->get();
                });

                $query->when($request->latest === 'terlama' ,function ($terlama){
                    $terlama->oldest()->get();
                });
            })
            ->when($request->perpage, function($query) use ($request){
                $query->when($request->perpage === '10' ,function ($var){
                    $var->take(10);
                });
                $query->when($request->perpage === '20' ,function ($var){
                    $var->take(20);
                });
                $query->when($request->perpage === '50' ,function ($var){
                    $var->take(50);
                });
                $query->when($request->perpage === '100' ,function ($var){
                    $var->take(100);
                });
            })
            ->fastPaginate($pagination);
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
        return $this->model->query()
        ->where('status',NewsStatusEnum::ACTIVE->value)
        ->withCount('views')
        ->orderBy('views_count','desc')
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

    public function showWhithCount(): mixed
    {
        return DB::table('news')
            ->select('news.id', 'news.name', 'news.photo', DB::raw('DATE_FORMAT(news.created_at, "%M %d, %Y") as created_at_formatted') ,DB::raw('COUNT(views.news_id) as views_count'))
            ->leftJoin('views', 'news.id', '=', 'views.news_id')
            ->groupBy('news.id', 'news.name')
            ->orderBy('views_count', 'desc')
            ->take(6)
            ->get();
    }

   

}
