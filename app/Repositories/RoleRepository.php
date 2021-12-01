<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public function getAll()
    {
        $roles = Role::all();
        return $roles;
    }
}
