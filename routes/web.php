<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
Route::get('/', function(){
    return view('welcome');
});

Route::get('posts', [PostController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');


// Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
    // $user = Socialite::driver('github')->user();
    $githubUser = Socialite::driver('github')->user();


    $user = User::updateOrCreate([
        'email' => $githubUser->email,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
    // $user->token
});


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.gogle');

Route::get('/auth/callback/google', function () {
    $googleUser = Socialite::driver('google')->user();


    $user = User::updateOrCreate([
        'email' => $googleUser->email,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
    // $user->token
});
