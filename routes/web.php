<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Frontend\AccountController;

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
Route::middleware('auth.frontend')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
});







Route::get('/about-us', [IndexController::class, 'about_us'])->name('about-us');
Route::get('/help-center', [IndexController::class, 'help_center'])->name('help-center');

// not allocated route
Route::get('/contact-us', [IndexController::class, 'contact_us'])->name('contact');
Route::get('/privacy-policy', [IndexController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/terms', [IndexController::class, 'terms_page'])->name('terms');
Route::get('/refund-policy', [IndexController::class, 'refund_policy'])->name('refund-policy');
// not allocated route


Route::get('/404', [IndexController::class, 'not_found'])->name('error_page');
Route::get('/thank-you', [IndexController::class, 'thank_you'])->name('thank_you');

Route::post('/contact-save', [IndexController::class, 'contact_save'])->name('contact.create');
Route::post('/comment-save', [IndexController::class, 'comment_save'])->name('comment.create');

Route::get('/search', [IndexController::class, 'search'])->name('search');
// Home END

//------------------------------ dummy controller ----------------------

Route::get('/registration', [AccountController::class, 'registration_page'])->name('registration');

Route::any('/create-account/{param}', [AccountController::class, 'create_account'])->name('account.create');

Route::get('/login', [AccountController::class, 'login'])->name('login');

Route::post('/login', [AccountController::class, 'customer_login'])->name('customer.login');

Route::any('/get-privious-page', function () {
    $step = Session()->get('step');
    $step = $step - 1;
    Session()->put('step', $step);
})->name('get-privious-page');


Route::get('/update-session', function () {
    Session()->put('temp_user_id', 2);
    Session()->put('step', 9);
})->name('update-session');


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


Route::get('/test-otp', function () {
    $sessionData = Session()->all();

    // Print session data
    dd($sessionData);
});

Route::get('/clear-session', function () {
    Session()->flush();

    echo"clear";
});
