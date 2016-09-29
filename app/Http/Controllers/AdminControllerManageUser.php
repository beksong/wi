<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminManageUserRequest;
use App\User;
use App\Role;
class AdminControllerManageUser extends Controller
{
    //
   public function tbUser()
   {
   		$users=User::all();
   		$roles=Role::all();
   		return view('manageuser.tbuser',array('users'=>$users,'roles'=>$roles));
   }

   public function assignRole(AdminManageUserRequest $request)
   {
   		$users=User::where('id','=',$request->get('user_id'))->first();
   		$roles=Role::where('id','=',$request->get('role_id'))->first();

   		$users->attachRole($roles);
   		return $this->tbUser();
   }

   public function removeRole(AdminManageUserRequest $request)
   {
      # code...
      $users=User::find($request->get('user_id'));
      $role_id=$request->get('role_id');

      $users->detachRoles($users->roles);
      return $this->tbUser();
   }
}
