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
        $ids = array_wrap($ids);

        $stores = $this->model->whereIn('id', $ids)->where('status', '!=', $status);
        $ownerIds = $stores->pluck('user_id')->all();

        $stores->update(['status' => $status]);

        return $ownerIds;
    }

    public function getAllStores($paginate = 10)
    {
        return $this->model->with('owner')->orderBy('created_at', 'desc')->paginate($paginate);
    }

    public function getStoreDetail($id)
    {
        return $this->model->with('owner')->findOrFail($id);
    }
}
