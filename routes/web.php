<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;

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

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

Route::get('/register',[HomeController::class,'register']);

Route::get('/profile', [IndexController::class, 'userProfile'])->name('profile');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Admin Routes
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('/add_user',[AdminController::class,'registerUser']);
Route::post('/register-user1',[AdminController::class,'registerUser1']);

Route::put('/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::delete('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

Route::post('/create-insurance', [AdminController::class, 'createInsurance'])->name('admin.createInsurance');
Route::delete('/delete-insurance/{id}', [AdminController::class, 'deleteInsurance'])->name('admin.deleteInsurance');

// User Routes
Route::post('/insert-booking', [UserController::class, 'insertBooking']);
Route::post('/insert-booking1', [UserController::class, 'insertBooking1']);
Route::post('/update-booking', [AdminController::class, 'updateBookingStatus']);
Route::delete('/delete-booking/{id}', [UserController::class, 'deleteBooking'])->name('delete-booking');

Route::post('/create-insurance', [UserController::class, 'createInsurance'])->name('user.createInsurance');
Route::delete('/delete-insurance/{id}', [UserController::class, 'deleteInsurance'])->name('user.deleteInsurance');

Route::put('/update-user/{id}', [UserController::class, 'updateUser']);

Route::post('/booking/{id}/update_booking', [AdminController::class, 'updateBookingStatus'])->name('booking.update_booking');

use App\Http\Controllers\DoctorController;

// Route for creating an insurance form
Route::post('/insurance_create', [DoctorController::class, 'createInsurance'])->name('insurance.create');

// Route for deleting an insurance form by ID
Route::delete('/insurance_delete/{id}', [DoctorController::class, 'deleteInsurance'])->name('insurance.delete');

// Route for referring a doctor in a booking by ID
Route::post('/refer-doctor', [DoctorController::class, 'referDoctor']);
Route::post('/rate-doctor', [DoctorController::class, 'rateDoctor']);
Route::post('/remind-patient', [DoctorController::class, 'remindPatient']);
// Route for updating the status of a booking by ID
Route::patch('/booking/{id}/update-status', [DoctorController::class, 'updateBookingStatus'])->name('booking.update-status');

use App\Http\Controllers\PaymentController;

Route::get('/payment', [PaymentController::class, 'showForm']);
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');