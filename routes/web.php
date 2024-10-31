<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\SendPromotionController;

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

// Redirect to login if user is not authenticated
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard route, only accessible by authenticated users
Route::get('/dashboard', function () {
    return view('admin.blank.index');
})->name('dashboard');


    // Route untuk Submenu 1
Route::get('/submenu1', [AdminController::class, 'submenu1'])->name('submenu1');

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

Route::resource('departments', DepartmentController::class);

route::resource('employees', EmployeeController::class);

route::resource('payroll', PayrollController::class);

Route::resource('leave', LeaveController::class);

Route::resource('attendance', AttendanceController::class);

Route::resource('customers', CustomerController::class);

Route::resource('promotions', PromotionsController::class);

Route::post('send-promotion/{customer}/{promotion}', [SendPromotionController::class, 'sendPromotion'])->name('send-promotion');

//email
Route::get('email' , function(){

    Mail::to('adi@email.com')
        ->send(new TestMail);
    return'OK';
});
