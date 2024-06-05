<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthenticateController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\TrumbowygController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\BusinessSettingController;
use App\Http\Controllers\backend\UserController;

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

//authentication
Route::get('/', function () { return redirect(route('backend.login')); });
Route::get('/login', [AuthenticateController::class, 'index'])->name('backend.login');
Route::post('/login', [AuthenticateController::class, 'login'])->name('backend.login');
Route::get('/logout', [AuthenticateController::class, 'logout'])->name('backend.logout');

//dashborad
Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');




//Testimonials
Route::group(['prefix' => 'testimonial'], function () {
    Route::get('/index', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/add', [TestimonialController::class, 'add'])->name('testimonial.add');
    Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/update', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::post('/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');
    Route::get('/status/{id}/{status}', [TestimonialController::class, 'status'])->name('testimonial.status');
});

//trumbowyg
Route::group(['prefix' => 'trumbowyg'], function () {
    Route::post('/upload', [TrumbowygController::class, 'upload'])->name('trumbowyg.upload');
});


//Contact
Route::group(['prefix' => 'contact'], function () {
    Route::get('/index', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/view/{id}', [ContactController::class, 'view'])->name('contact.view');
    Route::post('/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
});

//setting
Route::group(['prefix' => 'setting'], function () {
    Route::get('/index', [BusinessSettingController::class, 'index'])->name('setting.index');
    
    Route::get('/privacy-policy', [BusinessSettingController::class, 'privacy_policy'])->name('setting.privacy');
    Route::get('/terms', [BusinessSettingController::class, 'terms'])->name('setting.terms');
    Route::get('/refund-policy', [BusinessSettingController::class, 'refund_policy'])->name('setting.refund_policy');

    Route::post('/update', [BusinessSettingController::class, 'update'])->name('setting.update');
});



//clear cache
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');

    // Redirect back to the previous page
    return back()->with('status', 'Cache cleared successfully!');
})->name('clear-cache');

//User
Route::group(['prefix' => 'profile'], function () {
    Route::get('/userslist', [UserController::class, 'userslist'])->name('users.list');
    Route::get('/usersdata', [UserController::class, 'usersData'])->name('users.data');
    Route::get('/add', [UserController::class, 'add'])->name('user.add');
    Route::post('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/status/{id}/{status}', [UserController::class, 'status'])->name('user.status');
    Route::get('/approvestatusedit/{id}', [UserController::class, 'approvestatus'])->name('user.approvestatus');
    Route::get('/view/{id}', [UserController::class, 'view'])->name('user.view');
    Route::post('/password/reset/', [UserController::class, 'resetPassword'])->name('password.update');

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/reset/{id}', [UserController::class, 'password'])->name('user.password');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/reset', [UserController::class, 'reset'])->name('user.reset');    
});
