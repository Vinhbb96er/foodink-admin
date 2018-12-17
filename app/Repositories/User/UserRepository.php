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
}
