<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Http\Controllers\commentController;
use \Illuminate\Http\Request ;


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

Route::get('/', function () {
    return view('welcome');

});
Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::post('/posts/trashed/{post}/restore', [PostController::class, 'trashedRestore'])->name('posts.trashed.restore');
Route::post('/posts/trashed/{post}/force_delete', [PostController::class, 'trashedDelete'])->name('posts.trashed.destroy');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(middleware:"auth");

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store']);

Route::post('/comments', [commentController::class, 'store'])->name('comments.store');;

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::PUT('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::DELETE('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use Laravel\Socialite\Facades\Socialite;

//login using github

Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();

});

Route::get('/auth/github/callback', function (Request $request) {
    $userdata = Socialite::driver('github')->user();
    $user = User::where('email',$userdata->email)->where('auth_type','github')->first();
    if($user)
    {
        Auth::login($user);
    return redirect('/posts');
    }
    else{
    $uuid = str::uuid()->toString();
    $user = new User();
    $user->name = $userdata->nickname;
    $user->email =$userdata->email;
    $user->password = Hash::make($uuid.now());
    $user->auth_type = 'github';
    $user->save();
    Auth::login($user);
    return redirect('/posts');
}
});


//login using google
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();

});

Route::get('/auth/google/callback', function (Request $request) {
    $userdata = Socialite::driver('google')->user();
    $user = User::where('email',$userdata->email)->where('auth_type','google')->first();
    if($user)
    {
        Auth::login($user);
    return redirect('/posts');
    }
    else{
    $uuid = str::uuid()->toString();
    $user = new User();
    $user->name = $userdata->nickname;
    $user->email =$userdata->email;
    $user->password = Hash::make($uuid.now());
    $user->auth_type = 'google';
    $user->save();
    Auth::login($user);
    return redirect('/posts');
}
    // dd($userdata);
});
