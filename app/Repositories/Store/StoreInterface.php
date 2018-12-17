<?php

namespace App\Repositories\Store;

interface StoreInterface
{
    public function updateStatus($ids, $status);

    public function getAllStores($paginate = 10);
}
