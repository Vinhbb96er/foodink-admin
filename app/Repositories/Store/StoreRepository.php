<?php

namespace App\Repositories\Store;

use App\Repositories\BaseRepository;
use App\Models\Store;

class StoreRepository extends BaseRepository implements StoreInterface
{
    public function getModel()
    {
        return Store::class;
    }

    public function updateStatus($ids, $status)
    {
        return $this->model->whereIn('id', $ids)
            ->where('status', '!=', $status)
            ->update(['status' => $status]);
    }

    public function getAllStores($paginate = 10)
    {
        return $this->model->with('owner')->orderBy('created_at', 'desc')->paginate($paginate);
    }
}
