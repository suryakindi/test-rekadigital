<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\LandingPageController;
Use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->middleware('checksession')->name('login');
Route::post('/login', [LoginController::class, 'postlogin']);


Route::group(['middleware'=>'auth'], function(){
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin');
    Route::post('/admin', [AdminDashboardController::class, 'posttitlecompany']);
    Route::get('/admin/about', [AdminDashboardController::class, 'about'])->name('about');
    Route::post('/admin/about', [AdminDashboardController::class, 'postabout']);
    Route::get('/admin/service', [AdminDashboardController::class, 'service'])->name('service');
    Route::post('/admin/service', [AdminDashboardController::class, 'postservice']);
    Route::get('/admin/service/edit/{id}', [AdminDashboardController::class, 'editservice'])->name('edit_service');
    Route::post('/admin/service/edit/{id}', [AdminDashboardController::class, 'posteditservice']);
    Route::get('/admin/service/delete/{id}', [AdminDashboardController::class, 'deleteservice'])->name('delete_service');
    Route::get('/admin/ourteam', [AdminDashboardController::class, 'ourteam'])->name('ourteam');
    Route::post('/admin/ourteam', [AdminDashboardController::class, 'postourteam']);
    Route::get('/admin/ourteam/edit/{id}', [AdminDashboardController::class, 'editourteam'])->name('edit_ourteam');
    Route::get('/admin/ourteam/delete/{id}', [AdminDashboardController::class, 'deleteourteam'])->name('delete_ourteam');
    Route::get('/admin/contact', [AdminDashboardController::class, 'contact'])->name('contact');
    Route::post('/admin/contact',[AdminDashboardController::class, 'postcontact']);
    Route::get('/admin/logout', [AdminDashboardController::class, 'logout'])->name('logout');
    
});


