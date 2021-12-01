<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function create(Request $request)
    {
        $data = $request->only('name', 'email', 'password','role-id');
        $user = User::query()->create($data);
        $user->roles()->attach($data['role-id']);
        return $user;
    }

//    public function edit(Request $request,$id)
//    {
//        $user = User::findOrFail($id);
//        $data = $request->only('name','email');
//        return User::where('id','=','$id')->update($data);
//    }
    public function getRoleOfUser($userId)
    {   $result = [];
        $roles = DB::table('role_user')->where('user_id',$userId)->get();
        foreach ($roles as $role){
            $result[]= $role->role_id;
        }
        return $result;
    }
}
