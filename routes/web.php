<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

// Home START
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/contact-us', [IndexController::class, 'contact_us'])->name('contact');
Route::get('/privacy-policy', [IndexController::class, 'privacy_policy'])->name('privacy-policy');

Route::get('/terms', [IndexController::class, 'terms_page'])->name('terms');

Route::get('/about-us', [IndexController::class, 'about_us'])->name('about-us');
Route::get('/help-center', [IndexController::class, 'help_center'])->name('help-center');
Route::get('/refund-policy', [IndexController::class, 'refund_policy'])->name('refund-policy');

Route::get('/404', [IndexController::class, 'not_found'])->name('error_page');
Route::get('/thank-you', [IndexController::class, 'thank_you'])->name('thank_you');

Route::post('/contact-save', [IndexController::class, 'contact_save'])->name('contact.create');
Route::post('/comment-save', [IndexController::class, 'comment_save'])->name('comment.create');

Route::get('/search', [IndexController::class, 'search'])->name('search');
// Home END

//------------------------------ dummy controller ----------------------

Route::get('/registration1', [IndexController::class, 'registration1'])->name('registration1');
Route::get('/registration2', [IndexController::class, 'registration2'])->name('registration2');
Route::get('/registration3', [IndexController::class, 'registration3'])->name('registration3');
Route::get('/registration4', [IndexController::class, 'registration4'])->name('registration4');
Route::get('/registration5', [IndexController::class, 'registration5'])->name('registration5');
Route::get('/registration6', [IndexController::class, 'registration6'])->name('registration6');
Route::get('/registration7', [IndexController::class, 'registration7'])->name('registration7');
Route::get('/registration8', [IndexController::class, 'registration8'])->name('registration8');
Route::get('/registration9', [IndexController::class, 'registration9'])->name('registration9');
Route::get('/registration10', [IndexController::class, 'registration10'])->name('registration10');
Route::get('/registration11', [IndexController::class, 'registration11'])->name('registration11');
Route::get('/login', [IndexController::class, 'login'])->name('login');

Route::get('/admin', [IndexController::class, 'admin'])->name('admin');
Route::get('/edit-profile', [IndexController::class, 'edit_profile'])->name('edit-profile');
//------------------------------ dummy controller ----------------------


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    //$exitCode = Artisan::call('route:cache');
    //$exitCode = Artisan::call('key:generate');
});

Route::get('/key-generate', function () {
    Artisan::call('key:generate', ['--show' => true]);
    return 'Application key generated successfully!';
});

Route::get('/create-storage-link', function () {
    $exitCode = Artisan::call('storage:link');
    
    if ($exitCode === 0) {
        return 'Storage link created successfully.';
    } else {
        return 'Error creating storage link.';
    }
});

Route::get('/send-test-email', function () {
    Mail::raw('Test email content', function ($message) {
        $message->to('khanfaisal.makent@gmail.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
});