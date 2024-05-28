<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ReportInterface;
use App\Models\Report;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ReportRepository extends BaseRepository implements ReportInterface
{
    public function __construct(Report $report)
    {
        $this->model = $report;
    }

    public function getAllWithUser()
    {
        return $this->model->query()
            ->get();
    }

    public function where(Request $request): mixed
    {
        return $this->model->whereIn('status_delete', $request)->ger();
    }

    public function whereAuthor(): mixed
    {
        return $this->model->query()
            ->where('status_delete', 0)
            ->whereRelation('news', 'user_id', auth()->user()->id)
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

    public function count($data): mixed
    {
        return $this->model->query()
            ->where('status', $data)
            ->get()
            ->count();
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->latest()
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
