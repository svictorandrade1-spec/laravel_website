<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('testing');
});

// Rotas originais mantidas
Route::get('/signUp', function () {
    return view('SignUp');
});
Route::post('/sign-up', [UserController::class, 'signup']);

Route::get('/SignIn', function () {
    return view('SignIn');
});
Route::post('/signin', [UserController::class, 'signin']);

Route::get('/profile', [UserController::class, 'profile']);

Route::get('/help', function () {
    return view('help');
});

Route::get('/Browse', [UserController::class, 'browse']);

Route::post('/upload', [UserController::class, 'upload']);

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

// Redirects para variações de capitalização (corrige o botão voltar)
Route::get('/signup',  fn() => redirect('/signUp'));
Route::get('/signin',  fn() => redirect('/SignIn'));
Route::get('/browse',  fn() => redirect('/Browse'));
Route::get('/userinfo/{user_name}', fn($user_name) => redirect("/UserInfo/$user_name"));
Route::get('/editpost/{postUUID}', fn($postUUID) => redirect("/EditPost/$postUUID"));
Route::get('/thepost/{postUUID}', fn($postUUID) => redirect("/ThePost/$postUUID"));