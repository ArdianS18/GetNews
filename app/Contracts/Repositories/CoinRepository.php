<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CoinInterface;
use App\Models\Coin;

class CoinRepository extends BaseRepository implements CoinInterface
{
    public function __construct(Coin $coin)
    {
        $this->model = $coin;
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
            ->create($data);
    }
}
