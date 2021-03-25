<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PasswordRequest;
use App\Http\Requests\Dashboard\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('dashboard.user.index',compact('users'));
    }

    public function create() {
        $roles = Role::all();
        return view('dashboard.user.create',compact('roles'));
    }

    public function store(UsersRequest $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password)
        ]);

        $user->assignRole($request->roles);

        return redirect()->route('users.index')
            ->with('message','Data Updated Successfully');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('dashboard.user.show',compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRole = $user->roles->all();





        return view('dashboard.user.edit',compact('user','roles','userRole'));
    }

    public function update(UsersRequest $request,$id) {
        $user = User::findOrFail($id);
        $user::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->roles);
        return redirect()->route('users.index')
            ->with('message','Data Updated Successfully');
    }

    public function updatepassword(PasswordRequest $request) {

        $user = User::findOrFail($request->id);

        $user::where('id',$request->id)->update([
            'password' =>  Hash::make($request->password)
        ]);

        return redirect()->route('users.index')
            ->with('message','Data Updated Successfully');
    }

    public function destroy(Request $request)
    {
        User::findOrFail($request->id)->delete();
        return redirect()->route('users.index')
            ->with('message','Data Updated Successfully');
    }
}
