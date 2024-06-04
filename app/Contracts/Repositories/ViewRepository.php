<?php

namespace App\Contracts\Repositories;

use App\Models\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Contracts\Interfaces\ViewInterface;
use App\Enums\NewsStatusEnum;
use App\Models\Author;

class ViewRepository extends BaseRepository implements ViewInterface
{
    public function __construct(View $view)
    {
        $this->model = $view;
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

    public function deleteByAuthor(Author $author): mixed
    {
        return $this->model->query()
            ->whereRelation('news', 'user_id', $author->user_id)
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

    public function where(): mixed
    {
        return $this->model->query()
            ->whereRelation('news', 'user_id', auth()->user()->id)
            ->count();
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
            ->updateOrCreate( ['news_id' => $data['news_id'], 'ip' => $data['ip']],
            $data
        );
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

    public function showCountView(): mixed
    {
        //
    }

    public function trending(): mixed
    {
        $startDate = Carbon::now()->subDays(10)->toDateString();
        $endDate = Carbon::now()->toDateString();
        $trendingNews = $this->model->query()
        ->whereRelation('news', 'status', NewsStatusEnum::ACTIVE->value)
        ->select('news_id', DB::raw('COUNT(*) as total'))
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('news_id')
        ->orderBy('total', 'desc')
        ->take(9)
        ->get();

        return $trendingNews;
    }

    public function getByPopular($data): mixed
    {
        $startDate = Carbon::now()->subDays(10)->toDateString();
        $endDate = Carbon::now()->toDateString();
        $trendingNews = $this->model->query()
        ->whereRelation('news', 'status', NewsStatusEnum::ACTIVE->value)
        ->select('news_id', DB::raw('COUNT(*) as total'))
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('news_id')
        ->orderBy('total', 'desc')
        ->when($data == 'up', function ($query) {
            $query->take(6);
        })
        ->when($data == 'down', function ($query) {
            $query->take(3);
        })
        ->when($data == 'side', function ($query) {
            $query->take(4);
        })
        ->get();

        return $trendingNews;
    }

    public function getByLeft(): mixed
    {
        $startDate = Carbon::now()->subDays(10)->toDateString();
        $endDate = Carbon::now()->toDateString();

        $subquery = DB::table('news_categories')
            ->select('category_id', DB::raw('COUNT(*) as category_count'))
            ->groupBy('category_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get()
            ->pluck('category_id');


        $popularLeft = $this->model->query()
            ->whereRelation('news', 'status', NewsStatusEnum::ACTIVE->value)
            ->whereRelation('news.newsCategories', 'category_id', $subquery)
            ->select('news_id', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('news_id')
            ->orderBy('total', 'desc')
            ->take(4)
            ->get();

        return $popularLeft;
    }

    public function getByRight(): mixed
    {
        $startDate = Carbon::now()->subDays(10)->toDateString();
        $endDate = Carbon::now()->toDateString();

        $subquery = DB::table('news_categories')
            ->select('category_id', DB::raw('COUNT(*) as category_count'))
            ->groupBy('category_id')
            ->orderByRaw('COUNT(*) DESC')
            ->skip(1)
            ->take(1)
            ->pluck('category_id');

        $popularLeft = $this->model->query()
            ->whereRelation('news', 'status', NewsStatusEnum::ACTIVE->value)
            ->whereRelation('news.newsCategories', 'category_id', $subquery)
            ->select('news_id', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('news_id')
            ->orderBy('total', 'desc')
            ->take(4)
            ->get();

        return $popularLeft;
    }

    public function newsStatistic(): mixed
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        // Get top 3 trending news IDs based on total views in the past 7 days
        $topNewsIds = $this->model->query()
            ->whereRelation('news', 'status', NewsStatusEnum::ACTIVE->value)
            ->select('news_id', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('news_id')
            ->orderBy('total', 'desc')
            ->take(3)
            ->pluck('news_id');

        // Get daily views for each of the top 3 news items
        $dailyViews = $this->model->query()
            ->whereIn('news_id', $topNewsIds)
            ->whereRelation('news', 'status', NewsStatusEnum::ACTIVE->value)
            ->select('news_id', DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('news_id', 'date')
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy('news_id');

        $result = [];
        foreach ($topNewsIds as $newsId) {
            $views = $dailyViews->get($newsId, collect())->keyBy('date');
            $dailyData = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i)->toDateString();
                $dailyData[$date] = $views->get($date, (object)['total' => 0])->total;
            }
            $result[$newsId] = $dailyData;
        }

        return $result;
    }
}
