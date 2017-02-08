<?php

namespace Modules\Permissions\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Modules\Permissions\Entities\Permission;
use Modules\Permissions\Entities\PermissionGroup;

class AuthenticateController extends Controller
{

    public function index()
    {
        return response()->json(['auth'=>Auth::user(), 'users'=>User::all()]);
    }
    /*
        public function authenticate(Request $request)
        {
            $credentials = $request->only('email', 'password');

            try {
                // verify the credentials and create a token for the user
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
            } catch (JWTException $e) {
                // something went wrong
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            // if no errors are encountered we can return a JWT
            return response()->json(compact('token'));
        }
    */
    public function displayGroupPermissionForm(){
        $roles = Role::all();
        $permissionGroups = PermissionGroup::all();
        $permissions = Permission::all();
        $permissionGroupSelect = PermissionGroup::pluck('name', 'id')->all();
        $rolesSelect = Role::pluck('name', 'id')->all();
        return view('permissions::permission-views.create-permission-group',compact('roles', 'permissions' ,'rolesSelect', 'permissionGroups' ,'permissionGroupSelect'));
    }
    public function displayRolesForm(){
        $roles = Role::all();
        $permissionGroups = PermissionGroup::all();
        $permissions = Permission::all();
        $permissionGroupSelect = PermissionGroup::pluck('name', 'id')->all();
        $rolesSelect = Role::pluck('name', 'id')->all();
        return view('permissions::permission-views.create-role',compact('roles', 'permissions' ,'rolesSelect', 'permissionGroups' ,'permissionGroupSelect'));
    }
    public function createPermissionGroup(Request $request){
        // $role = Role::create(['name' => 'writer']);
        //return $request->input('name') . $request->input('description');

        $permissionGroup = new PermissionGroup();
        $permissionGroup->name = $request->input('name');
        $permissionGroup->description = $request->input('description');
        $permissionGroup->save();

        //return response()->json("created");
        return redirect()->route('permissions.form');
    }

    public function createPermission(Request $request){
        // $permission = Permission::create(['name' => 'edit articles']);
        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->description = $request->input('description');
        $permission->group_id = $request->input('group_id');
        $permission->save();

        //return response()->json("created");
        return redirect()->route('permissions.form');
    }
    public function createRole(Request $request){
        // $role = Role::create(['name' => 'writer']);
        // return $request->input('name');

        $role = new Role();
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        //return response()->json("created");
        return redirect()->route('roles.form');
    }

    public function assignRole(Request $request){
        // $user->assignRole(['writer', 'admin']);
        $user = User::where('email', '=', $request->input('email'))->first();

        $role = Role::where('name', '=', $request->input('role'))->first();
        //$user->attachRole($request->input('role'));
        $user->roles()->attach($role->id);

        return response()->json("created");
    }

    public function attachPermission(Request $request){
        // $role->givePermissionTo('edit articles');
        $role = Role::where('name', '=', $request->input('role'))->first();
        $permission = Permission::where('name', '=', $request->input('name'))->first();
        $role->attachPermission($permission);

        return response()->json("created");
    }
}
