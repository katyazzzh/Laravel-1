<?php

use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'hello';
});

Route::get('/posts', IndexController::class)->name('post.index');
Route::get('/posts/create', CreateController::class)->name('post.create');
Route::post('/posts', StoreController::class)->name('post.store');
Route::get('/posts/{post}', ShowController::class)->name('post.show');
Route::get('/posts/{post}/edit', EditController::class)->name('post.edit');
Route::patch('/posts/{post}', UpdateController::class)->name('post.update');
Route::delete('/posts/{post}', DestroyController::class)->name('post.destroy');

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');
