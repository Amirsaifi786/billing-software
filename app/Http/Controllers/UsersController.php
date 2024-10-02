<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = User::orderBy('created_at', 'desc')->get();        
        return view('user.user', compact('user'));   

    }

    /**
     * Show the form for creating a new resource.
     */
  
    public function dashboard()
    {
        $service=Service::count();

        // $itr=Itr::count()->where('assign_to', Auth::user()->id)->get();
        if(Auth::user()->role == 1 )
        {
            $itr=Itr::count();
            $gst=Gst::count();
            $msme=Msme::count();
        } 
        elseif(Auth::user()->role == 2) 
        {
            $gst=Gst::where('user_id', Auth::user()->id)->count();
            $itr=Itr::where('user_id', Auth::user()->id)->count();
            $msme=Msme::where('user_id', Auth::user()->id)->count();

        }
        elseif(Auth::user()->role == 3)
        {
            $gst=Gst::where('assign_to', Auth::user()->id)->count();
            $itr=Itr::where('assign_to', Auth::user()->id)->count();
            $msme=Msme::where('assign_to', Auth::user()->id)->count();

            // $gst=Gst::all();
        }
        else
        {
            $itr=Itr::all();
            $gst=Gst::all();
            $msme=Msme::all();

        }
      

        return view('service.dashboard',compact('service','gst','itr','msme'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //  $request->validate([
        //     'user' => 'required|string|max:250',
        //     'email' => 'required|email|max:250|unique:users',
        //     'password' => 'required|min:8|confirmed'
        // ]);

        User::create([
            'role' => $request->user_role,
            'name' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // $credentials = $request->only('email', 'password');
        // Auth::attempt($credentials);
        // $request->session()->regenerate();
        // return redirect()->route('dashboard')
        // ->withSuccess('You have successfully registered & logged in!');
        return response()->json([
            'status' => 'success',
            'message' => 'User Added Successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
    
        return response()->json(['user' => $user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $user = User::find($request->input('user_id'));
        $user->role = $request->input('role');
        $user->name = $request->input('user');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password) ?? $user->password;
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'user data update Successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dd($id);
        $user = User::find($id);

        // if (!$user) {
        //     return response()->json(
        //         [
        //             'status' => 'error',
        //             'message' => 'Paper set not found',
        //         ],
        //         404,
        //     );
        // }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'user deleted successfully',
        ]);
    
    }
}
