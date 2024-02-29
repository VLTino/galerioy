<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('hal.reg666',[
            "title" => "Register"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');  
        $user->email = $request->input('email');  
        $user->password = bcrypt($request->input('password'));  
        $user->level = $request->input('level');  
        $user->save();
        return redirect()->route('login')->with('success', 'User successfully registered. Please login.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userID = Auth::user()->userid;
        

        $user = profile::where('userid', $userID)->first();

        return view('hal.profile', [
            "title" => "Profile",
            "user" => $user,
        ]);
    }

    public function editLevel(Request $request, $userId)
    {
        // Validate the request
        $request->validate([
            'level' => 'required|in:admin,user,banned',
        ]);

        // Update the user's level
        $user = User::find($userId);

        // Check if the user exists
        if (!$user) {
            abort(404, 'User not found');
        }

        $user->level = $request->input('level');
        $user->save();

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'User level updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userid)
    {
        dd($userid);
    }
}
