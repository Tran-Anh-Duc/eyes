<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository= $roleRepository;
    }

    public function getAll()
    {
        $roles =$this->roleRepository->getAll();
        return $roles;
    }
}
