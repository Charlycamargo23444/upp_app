<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\PostController;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Video;
use App\Modals\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Controlador Users

Route::get('users/{user}',[UserController::class,'show'])->name('api.users.show');
Route::get('users', [UserController::class, 'index'])->name('api.users.index');
Route::post('users', [UserController::class, 'store'])->name('api.users.store');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('api.users.destroy');
Route::put('users', [UserController::class, 'update'])->name('api.users.update');
Route::patch('users', [UserController::class, 'update'])->name('api.users.update');

//Controlador Video

Route::get('videos/{video}',[VideoController::class,'show'])->name('api.videos.show');
Route::get('videos', [VideoController::class, 'index'])->name('api.videos.index');
Route::post('videos', [VideoController::class, 'store'])->name('api.videos.store');
Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('api.videos.destroy');
Route::put('videos/{video}', [VideoController::class, 'update'])->name('api.videos.update');
Route::patch('videos/{video}', [VideoController::class, 'update'])->name('api.videos.update');


Route::post('register', [AuthController::class, 'store'])->name('api.users.store');
Route::post('login', [AuthController::class, 'login'])->name('api.users.login');

Route::get('posts/{post}', [PostController::class, 'show'])->name('api.posts.show');
Route::get('posts', [PostController::class, 'index'])->name('api.posts.index');

Route::get('comments/{comment}', [CommentController::class, 'show'])->name('api.comments.show');
Route::get('comments', [CommentController::class, 'index'])->name('api.comments.index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
