<?php

namespace App\Repositories\ShipperOrder;

interface ShipperOrderInterface
{
    public function getAllShipperOrder($paginate = 10);
    
    public function getShipperOrder($id, $paginate = 10);
}
