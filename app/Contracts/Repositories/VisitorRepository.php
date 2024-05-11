<?php

namespace App\Contracts\Repositories;

use App\Models\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;;

use App\Contracts\Interfaces\VisitorInterface;
use App\Enums\NewsStatusEnum;
use App\Models\Visitor;

class VisitorRepository extends BaseRepository implements VisitorInterface
{
    public function __construct(Visitor $visitor)
    {
        $this->model = $visitor;
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

    public function where(): mixed
    {
    }

    /**
     * Handle store data event to models.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function store($data): mixed
    {
        return $this->model->query()
            ->updateOrCreate(
                ['visitor_id' => $data['visitor_id']],
                $data
            );
    }

    public function countChart(): mixed
    {
        $year = date('Y');

        $results = $this->model->query()
            ->select(DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', $year)
            ->orderBy('month')
            ->get();

        $monthlyVisitorData = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthlyVisitorData[$i] = 0;
        }

        foreach ($results as $result) {
            $monthlyVisitorData[$result->month]++;
        }

        return array_values($monthlyVisitorData);
    }
}
