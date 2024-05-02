<?php

namespace App\Contracts\Repositories;

use App\Models\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Contracts\Interfaces\ViewInterface;
use App\Enums\NewsStatusEnum;

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

    public function showCountView(): mixed
    {
        //
    }

    public function trending(): mixed
    {
        $startDate = Carbon::now()->subDays(10)->toDateString();
        $endDate = Carbon::now()->addDays(10)->toDateString();

        $trendingNews = $this->model->query()
            ->whereRelation('news','status', NewsStatusEnum::ACTIVE->value)
            ->select('news_id', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('news_id')
            ->orderBy('total', 'desc')
            ->limit(9)
            ->get();


        return $trendingNews;
    }
}
