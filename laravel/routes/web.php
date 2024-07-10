<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');

Route::get('/idea/{id}', [IdeaController::class, 'show'] )->name('idea.show');

Route::get('/idea/{id}/edit', [IdeaController::class, 'edit'] )->name('idea.edit');

Route::put('/idea/{id}/edit', [IdeaController::class, 'update'] )->name('idea.update');

Route::post('/idea', [IdeaController::class, 'store'] )->name('idea.create');

Route::post('/idea/{id}/comments', [CommentController::class, 'store'] )->name('idea.comment.create');

Route::delete('/idea/{id}', [IdeaController::class, 'destroy'] )->name('idea.destroy');


Route::get('/register', [AuthController::class, 'register'] )->name('register');

Route::post('/register', [AuthController::class, 'store'] );

Route::get('/login', [AuthController::class, 'login'] )->name('login');

Route::post('/login', [AuthController::class, 'authenticate'] );

Route::post('/logout', [AuthController::class, 'logout'] )->name('logout');