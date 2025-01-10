
<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QrCodeController;
  
Route::get('/', function () {
    //return view('welcome');
});
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/url/create', UrlController::class . '@create')->name('url.create');
    Route::get('/url/{url}/edit', UrlController::class .'@edit')->name('url.edit');
    Route::put('/url/{url}', UrlController::class .'@update')->name('url.update');
    Route::delete('/url/{url}', UrlController::class .'@destroy')->name('url.destroy');
    Route::post('/url', UrlController::class . '@store')->name('url.store');
});

Route::get('/url-index', UrlController::class . '@index')->name('url-index');
Route::post('/url-filter', UrlController::class . '@search')->name('url.search');

Route::get('/url/{url}/generate-qrcode', [QrCodeController::class, 'generate']);
Route::get('/profile', UserController::class . '@index')->name('user.profile');
Route::get('/{code}', UrlController::class . '@redirectfunction')->name('redirect-function');



