<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */ 
    public function create() {  //Function GET User
        return view('create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //This is for POST store user creating part. 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        echo ("User Created successfully.");
        User::create($data);


        return redirect()->route('home')->with('success', 'User CRUD created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) //This is for showing the information from home.blade.php but it seems that it is unneeded
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) //For updating based GET in the edit.blade.php
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //For updating based POST in the edit.blade.php
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        echo ("User Record Updated successfully.");
        return redirect()->route('home')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $user = User::find($id);

        if ($user->id === Auth::user()->id) {
            return redirect()->route('home')->with('error', 'You cannot delete your own account.'); //Making sure own account wont get deleted
        }

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        
        $user->delete();
        
        return redirect()->route('home')->with('success', 'User deleted successfully.');
    }
    
}
