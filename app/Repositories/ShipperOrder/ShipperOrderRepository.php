<?php

namespace App\Repositories\ShipperOrder;

use App\Repositories\BaseRepository;
use App\Models\ShipperOrder;

class ShipperOrderRepository extends BaseRepository implements ShipperOrderInterface
{
    public function getModel()
    {
        return ShipperOrder::class;
    }

    public function getAllShipperOrder($paginate = 10)
    {
        return $this->model->with(['order.store', 'order.customer', 'shipper.info'])->orderBy('created_at', 'desc')->paginate($paginate);
    }

    public function getShipperOrder($id, $paginate = 10)
    {
        return $this->model->where('shipper_id', $id)->with(['order.store', 'order.customer', 'shipper.info'])->orderBy('created_at', 'desc')->paginate($paginate);
    }
}
