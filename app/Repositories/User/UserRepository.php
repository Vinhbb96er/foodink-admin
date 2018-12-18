<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function createUser($data)
    {

        return $this->model->create($data);
    }

    public function updateOwner($ownerIds)
    {
        $ownerIds = array_wrap($ownerIds);

        $this->model->whereIn('id', $ownerIds)->whereHas('stores', function ($query) {
            $query->where('status', config('setting.store.status.accepted'));
        })->update([
            'role_id' => config('setting.role.store_owner'),
        ]);

        $this->model->whereIn('id', $ownerIds)->whereDoesntHave('stores', function ($query) {
            $query->where('status', config('setting.store.status.accepted'));
        })->update([
            'role_id' => config('setting.role.customer'),
        ]);
    }
}
