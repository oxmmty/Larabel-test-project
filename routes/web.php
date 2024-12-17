<?php
  
use App\Http\Controllers\Auth\UserStoreController;
use App\Http\Controllers\Auth\UserRegisterController;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\Mypage\EditProfileController;
use App\Http\Controllers\Customer\Mypage\UpdateProfileController;
use App\Http\Controllers\Customer\Mypage\ShowProfileController;
use App\Http\Controllers\MyEditController;
  
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::resource('users', UserController::class);

    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
    Route::get('registration', [AuthController::class, 'registration'])->name('registration');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('customers/export', [CustomerController::class, 'export'])->name('customers.export');
    Route::resource('customers', CustomerController::class);
});
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post'); 

Route::get('entry', UserRegisterController::class)->name('register');
Route::post('entry/store', UserStoreController::class)->name('entry.store');
Route::get('logout', LogoutController::class)->name('logout');
Route::get('dashboard', DashboardController::class);
Route::get('mypage', ShowProfileController::class)->name('mypage.index');
Route::get('mypage/edit', EditProfileController::class)->name('mypage.edit');
Route::put('mypage/update', UpdateProfileController::class)->name('mypage.update');
