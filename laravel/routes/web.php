<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');
Route::get('/terms', [DashboardController::class, 'terms'] )->name('terms');

Route::group([ 'prefix' => '/idea', 'as' => 'idea.', 'middleware' => ['auth'] ], function() {
    Route::post('', [IdeaController::class, 'store'] )->name('create')->withoutMiddleware('auth');
    
    Route::get('/{id}', [IdeaController::class, 'show'] )->name('show')->withoutMiddleware('auth');
    
    Route::get('/{id}/edit', [IdeaController::class, 'edit'] )->name('edit');
    
    Route::put('/{id}/edit', [IdeaController::class, 'update'] )->name('update');

    Route::post('/{id}/comments', [CommentController::class, 'store'] )->name('comment.create');

    Route::delete('/{id}', [IdeaController::class, 'destroy'] )->name('destroy');
});

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow')->middleware('auth');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');