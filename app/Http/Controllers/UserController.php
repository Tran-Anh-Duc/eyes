<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('backend.user.list', compact('users'));
    }

    public function showFormCreate()
    {
        $roles = $this->roleRepository->getAll();
        return view('backend.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $user = $this->userRepository->create($request);
        return redirect()->route('users.index');
    }

    public function showFormEdit($id)
    {
        $user = $this->userRepository->getById($id);
        $roles = $this->roleRepository->getAll();
        $roleOfUser = $this->userRepository->getRoleOfUser($id);
        return view('backend.user.edit', compact('user',"roles","roleOfUser"));
    }

    public function update(Request $request, $id)
    {
//        $user = $this->userRepository->edit($request,$id);
//        return redirect()->route('users.index');
        $user = User::query()->findOrFail($id);
        $data = $request->only('name', 'email');
        $user->roles()->sync($request->role_id);
        User::query()->where('id', '=', $id)->update($data);
        return redirect()->route('users.index');
    }


}
