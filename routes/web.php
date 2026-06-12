<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RisetController;
use Illuminate\Support\Facades\Route;

// Public
Route::get('/', [PublicController::class, 'home']);
Route::get('/ebook', [PublicController::class, 'ebookIndex']);
Route::get('/ebook/{slug}', [PublicController::class, 'ebookShow']);
Route::get('/kelas', [PublicController::class, 'courseIndex']);
Route::get('/kelas/{slug}', [PublicController::class, 'courseShow']);
Route::get('/template', [PublicController::class, 'templateIndex']);
Route::get('/template/{slug}', [PublicController::class, 'templateShow']);
Route::get('/bundling', [PublicController::class, 'bundling']);
Route::get('/materi', [PublicController::class, 'materiIndex']);
Route::get('/materi/modul/{modul}', [PublicController::class, 'materiModul'])->middleware('auth');
Route::get('/materi/{slug}', [PublicController::class, 'materiDetail'])->where('slug', '[a-z0-9\-]+');
Route::get('/tentang', [PublicController::class, 'tentang']);
Route::get('/riset', [RisetController::class, 'index']);
Route::post('/riset/generate', [RisetController::class, 'generate'])->middleware('auth');
Route::get('/blog', [PublicController::class, 'blogIndex']);
Route::get('/blog/{slug}', [PublicController::class, 'blogShow']);

// Auth
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Member
Route::middleware('auth')->prefix('member')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/order/{order}', [DashboardController::class, 'orderDetail']);
    Route::post('/checkout', [PublicController::class, 'checkout']);
    Route::post('/order/{order}/proof', [PublicController::class, 'uploadProof']);
    Route::get('/ebook/{ebook}/download', [PublicController::class, 'downloadEbook']);
    Route::get('/template/{template}/download', [PublicController::class, 'downloadTemplate']);
});

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index']);

    Route::resource('/ebook', Admin\EbookController::class);
    Route::resource('/kelas', Admin\CourseController::class);
    Route::post('/kelas/{kela}/lessons', [Admin\CourseController::class, 'storeLesson']);
    Route::put('/kelas/{kela}/lessons/{lesson}', [Admin\CourseController::class, 'updateLesson']);
    Route::delete('/kelas/{kela}/lessons/{lesson}', [Admin\CourseController::class, 'destroyLesson']);
    Route::resource('/blog', Admin\PostController::class);
    Route::resource('/template', Admin\TemplateController::class);
    Route::resource('/riset', Admin\RisetIdeaController::class);

    Route::get('/order', [Admin\OrderController::class, 'index']);
    Route::post('/order/{order}/approve', [Admin\OrderController::class, 'approve']);
    Route::post('/order/{order}/reject', [Admin\OrderController::class, 'reject']);
});
