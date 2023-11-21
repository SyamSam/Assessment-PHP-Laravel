<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{

    //Login View 
    function login(){
        
        return view('login');
    }


    //Register View
    function register(){
        
        return view('register');
    }


    //Function for Login Normally
    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'


        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)) //If sucessfully entered credentials
        {
            return redirect()->intended(route('welcome'));
        }
        echo ("User Logged in successfully.");
        return redirect(route('login'))->with("error", "Login unsucessfully and not valid");
    }


    //Registering Users
    function registerPost(Request $request) {
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
    
        $user = User::create($data); //Creating data

        if(!$user){
            return redirect(route('register'))->with("error", "Registration credentials are not valid, try again");
        }
        echo ("The User Registered successfully.");

        return redirect(route('login'))->with("success", "Registration sucessfully");
    }
    

    //Profile Section
    function editProfile()
    {
    $user = Auth::user(); // Get the currently authenticated user
    return view('edit-profile', compact('user'));
    }

    //POST update
    function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'confirmed', // trying out password confirmation
        ]);
    
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password); //This is for if password left not updated or change
        }
    
        $user->update($userData);
    
        return redirect()->route('home')->with('success', 'Profile updated successfully.');
    }
    
    


    function logout(){
        
        Auth::logout();
        echo ("The User Log Out successfully.");
        return redirect(route('login'));
    }

    public function home()
    {
        $users = User::all(); // Fetch all users from the database
        return view('home', compact('users'));
    }

    // edit Profile User



}
