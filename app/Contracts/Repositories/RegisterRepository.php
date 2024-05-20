<?php

namespace App\Contracts\Repositories;

use App\Models\Category;
use Illuminate\Database\QueryException;
use App\Contracts\Interfaces\RegisterInterface;
use App\Models\User;

class RegisterRepository extends BaseRepository implements RegisterInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }


}
