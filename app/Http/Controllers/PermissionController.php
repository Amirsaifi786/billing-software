<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Middleware\PermissionMiddleware;

class PermissionController extends Controller
{
        public function __construct()
    {
        $this->middleware('permission:Permission add',['only' => ['create']]);
        $this->middleware('permission:Permission edit',['only' => ['edit']]);
        $this->middleware('permission:Permission delete',['only' => ['destroy']]);
        $this->middleware('permission:Permission list');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $table_length = $request->table_length != '' ? $request->table_length : 10;
        $permissions = Permission::latest()->paginate($table_length);
    
        
        return view('permission-manager.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission-manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        try {
                $permission_types = ['add', 'edit', 'delete', 'list'];
                foreach($permission_types as $type){
                  $permission = new Permission();
                  $permission->name = $request->name.' '.$type;  
                  $saved = $permission->save();  
                }
//               }else{
//                 return back()->with('message', 'This Permission already exist!');  
//               }
                
                } catch (Exception $e) {
                  $saved = false;
                  Log::channel('activity')->error($e,['user' => auth()->user()->name, 'date' => now() ]); 
        }
        if ($saved) {
            Log::channel('activity')->info('Permission added successfully.',['user' => auth()->user()->name, 'date' => now() ]);
            return redirect()->route('permissionIndex')
                            ->with('message', 'Permission added successfully. ');
        }
        else {
            return back()->with('error', 'Something went wrong !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::find($id);
        return view('permission-manager.edit', compact('permissions'));
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
        // $this->validate($request, [
        //     'name' =>  'required|regex:/^[a-zA-Z]+$/i|max:255|unique:permission,name,'.$id,
        // ]);
        try {
                $permission = Permission::find($id);
                $permission->name = $request->name;
                $saved = $permission->save();
                } catch (Exception $e) {
                     $saved = false;
                     Log::channel('activity')->error($e,['user' => auth()->user()->name, 'date' => now() ]); 

        }
        if ($saved) {
            Log::channel('activity')->info('Permission updated successfully.',['user' => auth()->user()->name, 'date' => now() ]);
            return redirect()->route('permissionIndex')
                            ->with('message', 'Permission updated successfully.');
        } else {
            return back()->with('error', 'Something went wrong .');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions  = Permission::findOrFail($id);
        $permissions->delete();
        // Log::channel('activity')->info('Permission deleted successfully.',['user' => auth()->user()->name, 'date' => now() ]);
       return redirect()->back()->with('message', 'Permission deleted successfully ');
    }
}
