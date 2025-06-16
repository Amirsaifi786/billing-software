<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use DB;
class RoleController extends Controller {
    //       public function __construct()
    // {   $this->middleware('permission:Role add',['only' => ['create']]);
    //     $this->middleware('permission:Role edit',['only' => ['edit']]);
    //     $this->middleware('permission:Role delete',['only' => ['destroy']]);
    //     $this->middleware('permission:Role list');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $table_length = $request->table_length != '' ? $request->table_length : 10;
        $roles = Role::latest()->paginate($table_length);
        return view('role-manager.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $permissionName[] = strtok($permission->name, " ");
        }
        $modules = array_unique($permissionName);
        return view('role-manager.create', compact('modules'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request) {
    //     $this->validate($request, [
    //         'name' => 'required|regex:/^[a-z\s\-\.\_]+$/i|max:255|unique:roles,name',
    //     ]);
    //     try {
    //         $permissions = Permission::all();
    //         foreach ($permissions as $permission) {
    //             $permissionName[] = strtok($permission->name, " ");
    //         }
    //         $modules = array_unique($permissionName);
    //         $role = Role::create(['name' => $request->name]);
    //         foreach ($modules as $row) {
    //             $add = $row . "_add";
    //             $edit = $row . "_edit";
    //             $delete = $row . "_delete";
    //             $list = $row . "_list";
    //             if ($request->$add == 1) {
    //                 $name = str_replace("_", " ", $add);
    //                 $add_perm = Permission::findByName($name);
    //                 $role->givePermissionTo($add_perm);
    //                 $add_perm->assignRole($role);
    //             }
    //             if ($request->$edit == 1) {
    //                 $name = str_replace("_", " ", $edit);
    //                 $edit_perm = Permission::findByName($name);
    //                 $role->givePermissionTo($edit_perm);
    //                 $edit_perm->assignRole($role);
    //             }
    //             if ($request->$delete == 1) {
    //                 $name = str_replace("_", " ", $delete);
    //                 $delete_perm = Permission::findByName($name);
    //                 $role->givePermissionTo($delete_perm);
    //                 $delete_perm->assignRole($role);
    //             }
    //             if ($request->$list == 1) {
    //                 $name = str_replace("_", " ", $list);
    //                 // $write_perm = Permission::create(['name' => $request->name . " " . $name]);
    //                 $list_perm = Permission::findByName($name);
    //                 $role->givePermissionTo($list_perm);
    //                 $list_perm->assignRole($role);
    //             }
    //         }
    //     } catch (Exception $e) {
    //         Log::channel('activity')->error($e,['user' => auth()->user()->name, 'date' => now() ]); 
    //         return back()->with('error', 'Something went wrong ');
    //     }
    //         Log::channel('activity')->info('Role added successfully.',['user' => auth()->user()->name, 'date' => now() ]);
    //         return redirect()->route('roleIndex')
    //                     ->with('message', 'Role added successfully.');
    // }
    public function store(Request $request)
{
    // Validate role name
    $this->validate($request, [
        'name' => 'required|regex:/^[a-z\s\-\.\_]+$/i|max:255|unique:roles,name',
    ]);

    try {
        // Fetch all available permissions from the database
        $permissions = Permission::all();
        
        // Extract the unique module names from permission names
        $permissionNames = [];
        foreach ($permissions as $permission) {
            $permissionNames[] = strtok($permission->name, " ");
        }
        $modules = array_unique($permissionNames);

        // Create the new role
        $role = Role::create(['name' => $request->name]);

        // Loop over the modules and assign permissions based on the request input
        foreach ($modules as $module) {
            $add = $module . "_add";
            $edit = $module . "_edit";
            $delete = $module . "_delete";
            $list = $module . "_list";

            // Assign permissions conditionally, only if the checkbox is checked in the form
            if ($request->has($add) && $request->$add == 1) {
                $this->assignPermission($role, $add);
            }

            if ($request->has($edit) && $request->$edit == 1) {
                $this->assignPermission($role, $edit);
            }

            if ($request->has($delete) && $request->$delete == 1) {
                $this->assignPermission($role, $delete);
            }

            if ($request->has($list) && $request->$list == 1) {
                $this->assignPermission($role, $list);
            }
        }

    } catch (Exception $e) {
        Log::channel('activity')->error($e, ['user' => auth()->user()->name, 'date' => now()]);
        return back()->with('error', 'Something went wrong');
    }

    Log::channel('activity')->info('Role added successfully.', ['user' => auth()->user()->name, 'date' => now()]);
    return redirect()->route('roleIndex')
        ->with('message', 'Role added successfully.');
}

/**
 * Helper function to assign a permission to a role.
 */
protected function assignPermission($role, $permissionKey)
{
    // Convert permission key (e.g. "module_add") to the actual permission name (e.g. "module add")
    $permissionName = str_replace("_", " ", $permissionKey);

    // Find the permission by name
    $permission = Permission::findByName($permissionName);

    if ($permission) {
        // Assign the permission to the role
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
    }
}

    public function edit($id) {
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
              $permissionName[] = strtok($permission->name, " ");
        }
        $modules = array_unique($permissionName);
        $roles = Role::find($id);
        return view('role-manager.edit', compact('roles', 'modules'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|regex:/^[a-z\s\-\.\_]+$/i|max:255|unique:roles,name,' . $id,
        ]);
        try {
            $role = Role::find($id);
            $role->name = $request->name;
            $role->save();

            $permissions = Permission::all();
            foreach ($permissions as $permission) {
                $permissionName[] = strtok($permission->name, " ");
            }
            $modules = array_unique($permissionName);
            $all_permissions = array();
            foreach ($modules as $row) {
                $add = $row . "_add";
                $edit = $row . "_edit";
                $delete = $row . "_delete";
                $list = $row . "_list";
                if ($request->$add == 1) {
                    $name = str_replace("_", " ", $add);
                    $all_permissions[] = $name;
                    $add_perm = Permission::findByName($name);
                    $add_perm->assignRole($role);
                }
                if ($request->$edit == 1) {
                    $name = str_replace("_", " ", $edit);
                    $all_permissions[] = $name;
                    $edit_perm = Permission::findByName($name);
                    $edit_perm->assignRole($role);
                }
                if ($request->$delete == 1) {
                    $name = str_replace("_", " ", $delete);
                    $all_permissions[] = $name;
                    $delete_perm = Permission::findByName($name);
                    $delete_perm->assignRole($role);
                }
                if ($request->$list == 1) {
                    $name = str_replace("_", " ", $list);
                    $all_permissions[] = $name;
                    $list_perm = Permission::findByName($name);
                    $list_perm->assignRole($role);
                }
            }
            $role->syncPermissions($all_permissions);
        } catch (Exception $e) {
            Log::channel('activity')->error($e,['user' => auth()->user()->name, 'date' => now() ]); 
            return back()->with('error', 'Something went wrong !');
        }
        Log::channel('activity')->info('Role updated successfully.',['user' => auth()->user()->name, 'date' => now() ]);
        return redirect()->route('roleIndex')
                        ->with('message', 'Role updated successfully .');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) { 
    $role = Role::find($id); 
    $users = DB::table('model_has_roles')->where('role_id',$id)->get();
    $roleName=$role->name;
        if ($roleName== "admin" || $roleName == "Admin"|| $roleName == "Super Admin") 
        {
                return back()->with('message', 'Admin role can not delete.');
        } 
            elseif (!$users->isEmpty())
            {
               return back()->with('message', 'Role already assign to user you cannot delete it. ');
           }          
        else  
             {
            foreach($role->getAllPermissions() as $permission) {
            $role->revokePermissionTo($permission);
            $permission->removeRole($role);
            }
            $role->delete();
            Log::channel('activity')->info('Role deleted successfully.',['user' => auth()->user()->name, 'date' => now() ]);
            return redirect()->route('roleIndex')->with('message', 'Role deleted successfully .');
            }
 }
}