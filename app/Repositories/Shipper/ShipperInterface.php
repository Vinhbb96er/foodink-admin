<?php

namespace App\Repositories\Shipper;

interface ShipperInterface
{
    public function getAllShippers($paginate = 10);

    public function createShipper($data);

    public function updateStatus($ids, $status);

    public function getShipperDetail($id);

    public function updateShipper($id, $shipperData, $userData);
}
