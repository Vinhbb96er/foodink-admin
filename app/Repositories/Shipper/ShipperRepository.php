<?php

namespace App\Repositories\Shipper;

use App\Repositories\BaseRepository;
use App\Models\Shipper;
use App\Models\User;

class ShipperRepository extends BaseRepository implements ShipperInterface
{
    public function getModel()
    {
        return Shipper::class;
    }

    public function getAllShippers($paginate = 10)
    {
        return $this->model->with('info')->orderBy('created_at', 'desc')->paginate($paginate);
    }

    public function createShipper($data)
    {
        return $this->model->create($data);
    }

    public function updateStatus($ids, $status)
    {
        $ids = array_wrap($ids);

        return $this->model->whereIn('id', $ids)
            ->where('status', '!=', $status)
            ->update(['status' => $status]);
    }

    public function getShipperDetail($id)
    {
        return $this->model->with('info')->find($id);
    }

    public function updateShipper($id, $shipperData, $userData)
    {
        $shipper = $this->model->where('id', $id);
    
        $shipper->update($shipperData);
        $shipper->first()->info()->update($userData);
    }
}
