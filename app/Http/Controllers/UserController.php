<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller {
 public function __construct()
{
    $this->middleware('permission:User add', ['only' => ['create', 'store']]);
    $this->middleware('permission:User edit', ['only' => ['edit', 'update']]);
    $this->middleware('permission:User delete', ['only' => ['destroy']]);
    $this->middleware('permission:User list', ['only' => ['index', 'show']]); // important
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $table_length = $request->table_length != '' ? $request->table_length : 10;
        $users = User::latest()->paginate($table_length);
        return view('users-manager.index', compact('users'));
    }
      public function create() {
        $roles = Role::all();
        return view('users-manager.create', compact('roles'));
    }  
    public function store(Request $request)
    {
        // Validate the form inputs
        $this->validate($request, [
            'name' => 'required|regex:/^[a-z\s\-\.]+$/i|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6|max:50|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required|exists:roles,id', // Ensure the role exists based on ID
        ]);


    
        try {
            // Create new user
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $saved = $user->save();
        } catch (Exception $e) {
            $saved = false;
            Log::channel('activity')->error($e, ['user' => auth()->user()->name, 'date' => now()]);
        }
    
        if ($saved) {
            // Fetch the role by ID and assign it to the user
            $role = Role::findById($request->role); // Find role by ID
            $user->assignRole($role);
    
            Log::channel('activity')->info('User added successfully.', ['user' => auth()->user()->name, 'date' => now()]);
            return redirect()->route('userIndex')->with('message', 'User added successfully.');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
    
       public function edit($id) {
        $user =  User::find($id);
        $roles = Role::all();
        return view('users-manager.edit', compact('user', 'roles'));
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
        // Validate the incoming request
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email,' . $id, // Ensure email is unique except for the current user
            'password' => 'nullable|min:6|max:50|confirmed',
            'role' => 'required|exists:roles,name', // Ensure role exists in roles table
            // 'status' => 'required',
        ]);
        // dd($this->validate);die;
    
        try {
            // Find the user by ID
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
    
            // If a password is provided, update it
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
    
            // Get the current role(s) of the user
            $currentRole = $user->roles->first(); // Assuming a single role system
    
            // Update the role only if it's different from the current one
            if ($currentRole && $currentRole->name != $request->role) {
                $user->removeRole($currentRole->name); // Remove the old role
                $user->assignRole($request->role); // Assign the new role
            } elseif (!$currentRole) {
                // If the user has no role, assign the new one
                $user->assignRole($request->role);
            }
    
            // Update user status
            $user->status = $request->status;
    
            // Save the user
            $saved = $user->save();
        } catch (Exception $e) {
            Log::channel('activity')->error($e, ['user' => auth()->user()->name, 'date' => now()]);
            return back()->with('error', 'Something went wrong while updating the user.');
        }
    
        if ($saved) {
            Log::channel('activity')->info('User updated successfully.', ['user' => auth()->user()->name, 'date' => now()]);
            return redirect()->route('userIndex')->with('message', 'User updated successfully.');
        } else {
            return back()->with('error', 'Something went wrong while updating the user.');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request) {
        $user = User::find($id);     
        $role = $user->getRoleNames(); 
        if($role['0'] == "admin" || $role['0'] == "Admin" || $role['0'] == "Super Admin" )
        {
            return back()->with('message', 'Admin role can not allow to deleted . ');
       
        } elseif ( Auth::User()->name==$user->name)
         {
            return back()->with('message', 'login user cannot delete. ');
        } 
        else {
            //role delete
            foreach ($user->roles->pluck('id') as $role) {}
            $user->removeRole($role);
            $user->delete();
            Log::channel('activity')->info('user deleted successfully.', ['user' => auth()->user()->name, 'date' => now()]);
            return redirect()->back()->with('message', 'User deleted successfully.');
        }
    }
}
