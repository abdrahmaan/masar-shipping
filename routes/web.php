<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\DeliveryEmpController;
use App\Http\Controllers\ElevatorSpecificationsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PenalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SecondPartyController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\WarantyController;

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

Route::middleware(['auth-user'])->group(function () {

       // Dashboard

            Route::redirect("/",'/dashboard');

            Route::get('/dashboard', [DashboardController::class,"index"]);


       // ***************************************************************************



       // Delivery Client

             // New Delivery Client
             Route::get('/new-delivery', [DeliveryEmpController::class,"create"]);

             // New Delivery Client - Store
             Route::post('/new-delivery', [DeliveryEmpController::class,"store"]);

             // Edit Delivery Client
             Route::get('/edit-delivery/{id}', [DeliveryEmpController::class,"edit"]);

             // Edit Delivery Client - Update
             Route::post('/edit-delivery/{id}', [DeliveryEmpController::class,"update"]);

             // Delivery Delete
             Route::get('/delete-delivery/{id}', [DeliveryEmpController::class,"destroy"]);

             // All Delivery Client View
             Route::get('/deliveries', [DeliveryEmpController::class,"index"] );

             // Delivery Profile
             Route::get('/delivery/profile/{id}', [DeliveryEmpController::class,"show"] );
             Route::get('/profile/{id}', [DeliveryEmpController::class,"show"] );

       // ***************************************************************************




       // Payment Reports

           // New Payment
           Route::get('/new-payment/{id}', [PaymentController::class,"create"]);

           // New Payment - Store
           Route::post('/save-payment', [PaymentController::class,"store"]);

           // All Payments
           Route::get('/clients-payments', [PaymentController::class,"index"] );

           // All Payments
           Route::get('/delete-payment/{id}', [PaymentController::class,"destroy"] );

       // ***************************************************************************



       // Employees

           // New Employee
           Route::get('/new-employee', [EmployeeController::class,"create"]);

           // New Employee - Store
           Route::post('/new-employee', [EmployeeController::class,"store"]);

           // All Employee
           Route::get('/employees', [EmployeeController::class,"index"] );

           // Edit Employee
           Route::get('/employees/edit/{id}', [EmployeeController::class,"edit"] );

           // Edit Employee - Submit
           Route::post('/employees/edit/{id}', [EmployeeController::class,"update"] );

           // Delete Employee
           Route::get('/delete-employees/{id}', [EmployeeController::class,"destroy"]);

           // Reset Password Employee
           Route::get('/reset-password-employees/{id}', [EmployeeController::class,"resetPassword"]);

           // Change Password
           Route::get('/change-password', [EmployeeController::class,"change_password_page"] );

           // Change Password - Logic
           Route::post('/change-password', [EmployeeController::class,"change_password_logic"] );
       // ***************************************************************************


       // Roles

           // New Role
           Route::get('/new-role', [RoleController::class,"create"]);

           // New Role - Store
           Route::post('/new-role', [RoleController::class,"store"]);

           // All Roles
           Route::get('/roles', [RoleController::class,"index"] );

           // Edit Roles
           Route::get('/roles/edit/{role}', [RoleController::class,"edit"] );

           // Edit Roles - Submit
           Route::post('/roles/edit/{role}', [RoleController::class,"update"] );

           // Delete Role
           Route::get('/delete-roles/{role}', [RoleController::class,"destroy"]);

       // ***************************************************************************

});


Route::middleware(['un-auth-user'])->group(function () {

    // Auth

        // Login Page
        Route::get('/login', [EmployeeController::class,"login_page"]);

        // Login - submit
        Route::post('/login', [EmployeeController::class,"login_logic"]);



    // ***************************************************************************
});


// Logout
Route::get('/logout', [EmployeeController::class,"logout"]);
