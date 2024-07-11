<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');

Route::group([ 'prefix' => '/idea', 'as' => 'idea.', 'middleware' => ['auth'] ], function() {
    Route::post('', [IdeaController::class, 'store'] )->name('create')->withoutMiddleware('auth');
    
    Route::get('/{id}', [IdeaController::class, 'show'] )->name('show')->withoutMiddleware('auth');
    
    Route::get('/{id}/edit', [IdeaController::class, 'edit'] )->name('edit');
    
    Route::put('/{id}/edit', [IdeaController::class, 'update'] )->name('update');

    Route::post('/{id}/comments', [CommentController::class, 'store'] )->name('comment.create');

    Route::delete('/{id}', [IdeaController::class, 'destroy'] )->name('destroy');
});