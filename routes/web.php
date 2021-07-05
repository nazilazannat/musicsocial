<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\UserController@welcome');
Route::get('post/{post_id}', 'Frontend\UserController@single_post');


Auth::routes();

// Frontend

// Post
Route::post('new-post',  'Frontend\PostController@new_post');

// Route::get('/', function () { return view('welcome');});
// Profile
Route::get('profile/{name}',  'Frontend\UserController@profile');

// Edit
Route::get('edit/{name}',  'Frontend\UserController@edit');
Route::post('edit/{id}',  'Frontend\UserController@save_general');

// Security
Route::get('security/{name}',  'Frontend\UserController@security');
Route::post('security',  'Frontend\UserController@ChangePassword');

// Device
Route::get('device', 'Frontend\UserController@device');


Route::post('update-ava','Frontend\UserController@update_avatar');
Route::post('updatecover','Frontend\UserController@update_cover');

Route::get('changestatus', 'Frontend\UserController@status')->name('changestatus');




// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController',['except' => ['show','create','store']]);
});


// SuperAdmin
Route::namespace('Superadmin')->prefix('superadmin')->name('superadmin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController',['except' => ['show','create','store']]);
});
