<?php

namespace App\Repositories\User;

interface UserInterface
{
    public function createUser($data);

    public function updateOwner($ownerIds);
}
