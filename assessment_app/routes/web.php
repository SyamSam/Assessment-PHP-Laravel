<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager; //Importing AuthManager from controller
use App\Http\Controllers\UserController;//importing User Controller for CRUD
use App\Http\Controllers\PostModuleController; //Importing Post Modules for CRUD 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Main Laravel Page as the / is the main
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//For Basic Login and Register and Profile Update
Route::get('/home', [AuthManager::class, 'home'])->name('home'); //Showing the view home

Route::get('/login', [AuthManager::class , 'login'])->name('login'); //Rather than return view, using from controller is helpful
Route::post('/login', [AuthManager::class , 'loginPost'])->name('login.post');


Route::get('/register', [AuthManager::class , 'register'])->name('register'); //Rather than return view, using from controller is helpful
Route::post('/register', [AuthManager::class , 'registerPost'])->name('register.post'); 

Route::get('/edit-profile', [AuthManager::class, 'editProfile'])->name('edit-profile'); //GET from session profile user
Route::post('/update-profile', [AuthManager::class, 'updateProfile'])->name('update-profile');// POST session for update

Route::get('logout', [AuthManager::class , 'logout'])->name('logout');

Route::resource('users', UserController::class);

//Parts of CRUD User
Route::get('/create-user', 'UserController@create')->name('create-user'); //View and fetch from the selected user
Route::post('/store-user', 'UserController@store')->name('store-user'); // POST  storing new user

Route::get('/edit-user/{user}', 'UserController@edit')->name('edit-user'); // Edit the which part based on ID
Route::post('/update-user/{user}', 'UserController@update')->name('update-user'); // Update the User based on its ID with the update part

Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete-user'); //Delete 


//Parts of Post Modules
Route::get('/home-post', [PostModuleController::class, 'homepost'])->name('home-post'); //View Post Modules
Route::get('/create-post', [PostModuleController::class, 'create'])->name('create-post'); //Get the Post from the creating post
Route::post('/store-post', [PostModuleController::class, 'store'])->name('store-post'); //POST function for creating and storing the post 

Route::get('/edit-post/{post}', [PostModuleController::class, 'edit'])->name('edit-post'); //Edit Stuff get based on Post ID
Route::post('/update-post/{post}', [PostModuleController::class, 'update'])->name('update-post'); //Updates with another method called PUT since for some reason POST doesnt work this one
Route::delete('/posts/{post}', [PostModuleController::class, 'delete'])->name('delete-post'); //DELETE POST