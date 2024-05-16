<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AdvertisementInterface;
use App\Contracts\Interfaces\SubscribeInterface;
use App\Enums\AdvertisementStatusEnum;
use App\Models\Advertisement;
use App\Models\Subscribe;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AdvertisementRepository extends BaseRepository implements AdvertisementInterface
{
    public function __construct(Advertisement $advertisement)
    {
        $this->model = $advertisement;
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

    public function search(mixed $request): mixed
    {
        return $this->model->where('question', 'LIKE', '%' . $request->question . '%')->get();
    }

    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->when($request->question, function ($query) use ($request) {
                $query->where('question', 'LIKE', '%' .  $request->question . '%');
            })
            ->fastPaginate($pagination);
    }

    /**
     * Handle the Get all data event from models.
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->where('user_id', auth()->user()->id)
            ->get();
    }

    public function where($id): mixed
    {
        return $this->model->query()
            ->when($id === "admin", function($query) {
                $query->where('status', AdvertisementStatusEnum::PENDING->value);
            })
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
