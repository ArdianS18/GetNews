<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ContactUsInterface;
use App\Models\ContactUs;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsRepository extends BaseRepository implements ContactUsInterface
{
    public function __construct(ContactUs $contactUs)
    {
        $this->model = $contactUs;
    }

    public function getAllWithUser()
    {
        return $this->model->query()
            ->get();
    }

    public function where(Request $request): mixed
    {
        return $this->model->whereIn('status_delete', $request)->get();
    }

    public function count($data): mixed
    {
        return $this->model->query()
            ->where('status', $data)
            ->get()
            ->count();
    }

    public function countAll($data): mixed
    {
        return $this->model->query()
            ->select('status')
            ->where('status', $data)
            ->union(DB::table('reports')
                ->select('status')
                ->where('status', $data)
            )
            // ->join('reports', 'contact_us.status', '=' , 'reports.status')
            // ->where('contact_us.status', $data)
            ->count();
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
