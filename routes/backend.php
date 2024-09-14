<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AuthenticateController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\TrumbowygController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\BusinessSettingController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\ManageController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ExcelImportController;

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


//Excel
Route::group(['prefix' => 'excel'], function () {
    Route::post('/skills/import', [ExcelImportController::class, 'skills_import'])->name('skills.import');
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
    Route::get('/add', [UserController::class, 'add'])->name('user.add');
    Route::post('/create', [UserController::class, 'create'])->name('user.create');
    // Route::post('/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/status/{id}/{status}', [UserController::class, 'status'])->name('user.status');
    Route::post('/approvestatusedit/{id}', [UserController::class, 'approvestatus'])->name('user.approvestatus');
    Route::get('/view/{id}', [UserController::class, 'view'])->name('user.view');
    Route::post('/password/reset/', [UserController::class, 'resetPassword'])->name('password.update');

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/reset/{id}', [UserController::class, 'password'])->name('user.password');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/reset', [UserController::class, 'reset'])->name('user.reset');    
});

Route::group(['prefix' => 'report'], function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

Route::group(['prefix' => 'post'], function () {
    Route::get('/listing', [PostController::class, 'index_posts'])->name('post.index_post');
    Route::get('/add', [PostController::class, 'add_posts'])->name('post.add_post');
    Route::get('/edit{id}', [PostController::class, 'edit_posts'])->name('post.edit_post');
    Route::get('/view{id}', [PostController::class, 'view_posts'])->name('post.view_post');

    Route::get('/likes_post{id}', [PostController::class, 'likes_post'])->name('post.likes_post');
    Route::get('/comments_post{id}', [PostController::class, 'comments_post'])->name('post.comments_post');
    Route::get('/shared_post{id}', [PostController::class, 'shared_post'])->name('post.shared_post');    

    Route::post('/create', [PostController::class, 'create_posts'])->name('post.create_post');
    Route::post('/update', [PostController::class, 'update_posts'])->name('post.update_post');
    Route::post('/delete/{id}', [PostController::class, 'delete_posts'])->name('post.delete_post');
});

Route::group(['prefix' => 'manage'], function () {
    Route::get('/notice-period/view', [ManageController::class, 'index_experience_status'])->name('manage.index_experience_status');
    Route::get('/experience_status/add', [ManageController::class, 'add_experience_status'])->name('manage.add_experience_status');
    Route::get('/experience_status/edit{id}', [ManageController::class, 'edit_experience_status'])->name('manage.edit_experience_status');
    Route::post('/experience_status/create', [ManageController::class, 'create_experience_status'])->name('manage.create_experience_status');
    Route::post('/experience_status/update', [ManageController::class, 'update_experience_status'])->name('manage.update_experience_status');
    Route::post('/experience_status/delete/{id}', [ManageController::class, 'delete_experience_status'])->name('manage.delete_experience_status');
    
    Route::get('/industry/view', [ManageController::class, 'index_industry'])->name('manage.index_industry');
    Route::get('/industry/add', [ManageController::class, 'add_industry'])->name('manage.add_industry');
    Route::get('/industry/edit{id}', [ManageController::class, 'edit_industry'])->name('manage.edit_industry');
    Route::post('/industry/create', [ManageController::class, 'create_industry'])->name('manage.create_industry');
    Route::post('/industry/update', [ManageController::class, 'update_industry'])->name('manage.update_industry');
    Route::post('/industry/delete/{id}', [ManageController::class, 'delete_industry'])->name('manage.delete_industry');
    
    Route::get('/currencies/view', [ManageController::class, 'index_job_title'])->name('manage.index_job_title');
    Route::get('/currencies/add', [ManageController::class, 'add_job_title'])->name('manage.add_job_title');
    Route::get('/currencies/edit{id}', [ManageController::class, 'edit_job_title'])->name('manage.edit_job_title');
    Route::post('/currencies/create', [ManageController::class, 'create_job_title'])->name('manage.create_job_title');
    Route::post('/currencies/update', [ManageController::class, 'update_job_title'])->name('manage.update_job_title');
    Route::post('/currencies/delete/{id}', [ManageController::class, 'delete_job_title'])->name('manage.delete_job_title');
    
    Route::get('/employment_type/view', [ManageController::class, 'index_references_from'])->name('manage.index_references_from');
    Route::get('/employment_type/add', [ManageController::class, 'add_references_from'])->name('manage.add_references_from');
    Route::get('/employment_type/edit{id}', [ManageController::class, 'edit_references_from'])->name('manage.edit_references_from');
    Route::post('/employment_type/create', [ManageController::class, 'create_references_from'])->name('manage.create_references_from');
    Route::post('/employment_type/update', [ManageController::class, 'update_references_from'])->name('manage.update_references_from');
    Route::post('/employment_type/delete/{id}', [ManageController::class, 'delete_references_from'])->name('manage.delete_references_from');
    
    Route::get('/skills/view', [ManageController::class, 'index_skills'])->name('manage.index_skills');
    Route::get('/skills/add', [ManageController::class, 'add_skills'])->name('manage.add_skills');
    Route::get('/skills/edit{id}', [ManageController::class, 'edit_skills'])->name('manage.edit_skills');
    Route::post('/skills/create', [ManageController::class, 'create_skills'])->name('manage.create_skills');
    Route::post('/skills/update', [ManageController::class, 'update_skills'])->name('manage.update_skills');
    Route::post('/skills/delete/{id}', [ManageController::class, 'delete_skills'])->name('manage.delete_skills');

    Route::get('/skills/excel-import', [ManageController::class, 'skills_import_form'])->name('manage.add_skills_import');
    
    Route::get('/years_of_exp/view', [ManageController::class, 'index_years_of_exp'])->name('manage.index_years_of_exp');
    Route::get('/years_of_exp/add', [ManageController::class, 'add_years_of_exp'])->name('manage.add_years_of_exp');
    Route::get('/years_of_exp/edit{id}', [ManageController::class, 'edit_years_of_exp'])->name('manage.edit_years_of_exp');
    Route::post('/years_of_exp/create', [ManageController::class, 'create_years_of_exp'])->name('manage.create_years_of_exp');
    Route::post('/years_of_exp/update', [ManageController::class, 'update_years_of_exp'])->name('manage.update_years_of_exp');
    Route::post('/years_of_exp/delete/{id}', [ManageController::class, 'delete_years_of_exp'])->name('manage.delete_years_of_exp');

});