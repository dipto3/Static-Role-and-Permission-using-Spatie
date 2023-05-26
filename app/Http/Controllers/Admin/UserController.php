<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Session;
class UserController extends Controller
{
   // public $user;

    // public function __construct(){

    //     $this->middleware(function($request , $next){
    //         $this->user = Auth::guard('web')->user();
    //         return $next($request);
    //     });
    // }
    public function show(){

        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request){
        // if(is_null($this->user) || !$this->user->can('create-users')){
        //     abort(403,'Unauthorized Access!');
        // }
       $data = [...$request->except(['password']), 'password' => bcrypt($request->password)];

        $user = User::Create($data);

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        return redirect()->back();
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
