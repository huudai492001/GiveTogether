<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//BaseController

Route::get('/', [BaseController::class, 'index'])->name('index');
Route::get('/event', [BaseController::class, 'event'])->name('event');
Route::get('/about', [BaseController::class, 'about'])->name('about');
Route::get('/causes', [BaseController::class, 'causes'])->name('causes');
Route::get('/blog', [BaseController::class, 'blog'])->name('blog');
Route::get('/detail_page', [BaseController::class, 'detail_page'])->name('detail_page');
Route::get('/service', [BaseController::class, 'service'])->name('service');
Route::get('/team', [BaseController::class, 'team'])->name('team');
Route::get('/donate', [BaseController::class, 'donate'])->name('donate');
Route::get('/volunteer', [BaseController::class, 'volunteer'])->name('volunteer');


