<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CauseController;


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


//Admin Controller
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
//    Category Controller
Route::prefix('category')->group(function (){
    Route::get('index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('edit/{slug}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('update/{slug}',[CategoryController::class, 'update'])->name('category.update');
    Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
});
//Cause Controller
Route::prefix('cause')->group(function (){
   Route::get('index', [CauseController::class, 'index'])->name('cause.index');
   Route::get('create', [CauseController::class, 'create'])->name('cause.create');
   Route::post('store', [CauseController::class, 'store'])->name('cause.store');

});
//BaseController
Route::get('/', [BaseController::class, 'index'])->name('index');
Route::get('/login',[BaseController::class, 'login'])->name('login');
Route::get('/event', [BaseController::class, 'event'])->name('event');
Route::get('/about', [BaseController::class, 'about'])->name('about');
Route::get('/causes', [BaseController::class, 'causes'])->name('causes');
Route::get('/blog', [BaseController::class, 'blog'])->name('blog');
Route::get('/detail_page', [BaseController::class, 'detail_page'])->name('detail_page');
Route::get('/service', [BaseController::class, 'service'])->name('service');
Route::get('/team', [BaseController::class, 'team'])->name('team');
Route::get('/donate', [BaseController::class, 'donate'])->name('donate');
Route::get('/volunteer', [BaseController::class, 'volunteer'])->name('volunteer');

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//


Route::middleware('auth')->group(function (){

});
