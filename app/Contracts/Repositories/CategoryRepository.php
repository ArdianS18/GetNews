<?php

namespace App\Contracts\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Enums\CategoryStatusEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Contracts\Interfaces\CategoryInterface;
use App\Enums\NewsStatusEnum;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use League\CommonMark\Extension\DescriptionList\Parser\DescriptionTermContinueParser;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function search(mixed $query): mixed
    {
        return $this->model->where('name', 'like', '%' . $query . '%')->paginate(5);
    }

    public function paginate(): mixed
    {
        return $this->model->query()
            ->latest()
            ->paginate(5);
    }

    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->when($request->category, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' .  $request->category . '%');
            })
            ->when($request->latest === "terbaru", function($query){
                $query->latest()->get();
            })
            ->when($request->latest === "terlama", function($query){
                $query->oldest()->get();
            })
            ->withCount('newsCategories')
            ->when($request->many === "teratas" , function($query) {
                $query->orderByDesc('news_categories_count');
            })
            ->when($request->many === "terbawah" , function($query) {
                $query->orderBy('news_categories_count', 'asc');
            })
            ->orderByDesc('news_categories_count')
            ->fastPaginate($pagination);
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
     * Handle get the specified data by id from models.
     *
     * @param string $slug
     * @return mixed
     */
    public function showWithSlug(string $slug): mixed
    {
        return $this->model->query()
            ->where(['slug' => $slug])
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

    public function showWhithCount(): mixed
    {
        return $this->model->query()
            ->whereRelation('newsCategories.news', 'status', NewsStatusEnum::ACTIVE->value)
            ->withCount('newsCategories')
            ->orderByDesc('news_categories_count')
            ->take(7)
            ->get();

    }

    public function showEditor(): mixed
    {
        return DB::table('categories')
        ->select('categories.id', 'categories.name', 'categories.slug', DB::raw('COUNT(news_categories.category_id) as total'))
        ->join('news_categories', 'categories.id', '=', 'news_categories.category_id')
        ->groupBy('categories.id', 'categories.name', 'categories.slug')
        ->orderBy('total', 'desc')
        ->take(3)
        ->get();
    }
}
