<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('testing');
});
Route::get('/signUp', function () {
    return view('SignUp');
});
Route::post('/sign-up', [UserController::class, 'signup']);

Route::get('/SignIn', function () {
    return view('SignIn');
});

Route::get('/profile', [UserController::class, 'profile']);

Route::post('/signin', [UserController::class, 'signin']);

Route::get('/help',function(){
    return view('help');
});
Route::get('/Browse', [UserController::class, 'browse']);

Route::post('/upload',[UserController::class, 'upload']);

Route::get('/ThePost/{postUUID}', [UserController::class, 'ThePostComments'])->name('ThePostComments');

Route::post('/commenting', [UserController::class, 'commenting']);

Route::post('/deletePost', [UserController::class, 'deletePost']);

Route::get('/EditPost/{postUUID}', [UserController::class, 'EditPost']);

Route::post('/EditPosted', [UserController::class, 'EditPosted']);

Route::get('/logout', function () {
    Session::flush();
    return redirect('/');
});
Route::post('/updateProfilePicture', [UserController::class, 'updateProfilePicture']);
Route::post('/removeProfilePicture', [UserController::class, 'removeProfilePicture']);

Route::post('/deleteComment', [UserController::class, 'deleteComment']);

Route::get('/UserInfo/{user_name}', [UserController::class, 'UserInfo']);
Route::get('/search', [UserController::class, 'search']);
Route::view('/about', 'about');