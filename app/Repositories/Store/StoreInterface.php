<?php

namespace App\Repositories\Store;

interface StoreInterface
{
    public function updateStatus($ids, $status);
}
