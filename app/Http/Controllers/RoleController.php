<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
 

    public function createRole()
    {
        $roles = Role::all(); // Fetch all roles
        return view('role', ['roles' => $roles]);
        
    }
    // public function storeRole(Request $request)
    // {
    //     $request->validate([
    //     'role' => ['required', 'string', Rule::in(Role::pluck('name'))],
    //     ]);

       
    //     $user = new User();
    //     $user->role = $request->role;
    //     $user->save();

    //     return Redirect::back();
    // }
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'permission' => 'array',
            'permission.*' => 'exists:permissions,id',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $permissions = Permission::whereIn('id', $request->input('permission'))->get();
        $role->syncPermissions($request->input('permission'));

        $this->syncPermissionsWithUsers($permissions, $role);

        
    
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('roles.edit',compact('role','permission','rolePermissions'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));

        // $this->syncPermissionsWithUsers($role->permissions);
        $this->syncPermissionsWithUsers($request->input('permission'), $role);
    
        return redirect()->route('roles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
    protected function syncPermissionsWithUsers($permissions, $role)
    {
        // Fetch all users and sync their permissions
        $usersWithRole = User::role($role->name)->get();
        $usersWithRole->each(function ($user) use ($permissions) {
        $user->syncPermissions($permissions);
    });
        // User::all()->each(function ($user) use ($permissions) {
        //     $user->syncPermissions($permissions);
        // });
    }
}
