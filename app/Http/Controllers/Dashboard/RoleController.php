<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RolesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::all();
        return view('dashboard.role.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('dashboard.role.create',compact('permissions'));
    }

    public function store(RolesRequest $request)
    {


        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission);

        return redirect()->route('roles.index')->with('message','Data added Successfully');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('dashboard.role.show',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('dashboard.role.edit',compact('role','permissions','rolePermissions'));
    }

    public function update(RolesRequest $request, $id)
    {



        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permission);

        return redirect()->route('roles.index')->with('message','Data Updated Successfully');
    }

    public function destroy(Request $request)
    {


        DB::table("roles")->where('id',$request->id)->delete();
        return redirect()->route('roles.index')->with('message','Data Deleted Successfully');
    }
}
