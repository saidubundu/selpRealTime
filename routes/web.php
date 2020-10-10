<?php

use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('/question', \App\Http\Controllers\QuestionController::class);
Route::resource('/question/{question}/reply', \App\Http\Controllers\ReplyController::class);
Route::post('/like/{reply}', [LikeController::class,'likeIt']);
Route::delete('/like/{reply}', [LikeController::class, 'unLikeIt']);
Route::post('/reply/{reply}/accept', AcceptAnswerController::class)->name('reply.accept');
Route::post('notifications', [NotificationController::class, 'index']);
Route::post('markAsRead', [NotificationController::class, 'markAsRead']);
Route::get('/question/watch/{id}', [\App\Http\Controllers\WatchersController::class, 'watcher']);
Route::delete('/question/unwatch/{id}', [\App\Http\Controllers\WatchersController::class, 'unWatcher']);

Route::get('/about', function (){
    return Inertia\Inertia::render('Tabs/About',[
        'auth_user' => \Illuminate\Support\Facades\Auth::user(),
    ]);
});
Route::get('/user/{user}', [QuestionController::class, 'user'])->name('user.show');
