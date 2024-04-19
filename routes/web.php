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

       // Cars

           // New Car
           Route::get('/new-car', [CarsController::class,"create"]);

           // New Car - Store
           Route::post('/new-car', [CarsController::class,"store"]);

           // Edit Car
           Route::get('/edit-car/{id}', [CarsController::class,"edit"]);

           // Edit Car - Update
           Route::post('/edit-car/{id}', [CarsController::class,"update"]);

           // Delete Car
           Route::get('/delete-car/{id}', [CarsController::class,"destroy"]);

           // New Car Import File
           Route::get('/new-car-import', [CarsController::class,"import_page"]);

           // New Car Import File - Store
           Route::post('/new-car-import', [CarsController::class,"import_store"]);



           // Cars View
           Route::get('/cars', [CarsController::class,"index"] );

           // Download Cars File
           Route::get('/download-file', function () {
               $path = public_path("Cars-Example.xlsx");
               $response = response()->download($path);
               // $response->headers->set('Refresh', '2;url=/cars');

               return $response;

           } );




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

       // Commercial Client

             // New Commercial Client
             Route::get('/new-commercial-client', [CommercialController::class,"create"]);

             // New Commercial Client - Store
             Route::post('/new-commercial-client', [CommercialController::class,"store"]);

             // Edit Commercial Client
             Route::get('/edit-commercial-client/{id}', [CommercialController::class,"edit"]);

             // Edit Commercial Client - Update
             Route::post('/edit-commercial-client/{id}', [CommercialController::class,"update"]);

             // Commercial Client Car
             Route::get('/delete-commercial-client/{id}', [CommercialController::class,"destroy"]);

             // All Commercial Client View
             Route::get('/commercial-clients', [CommercialController::class,"index"] );

             // Commercial Client Profile
             Route::get('/commercial-clients/profile/{id}', [CommercialController::class,"show"] );

       // ***************************************************************************

       // Appointments

           // New Appointment
           Route::get('/new-appointment/{id}', [AppointmentController::class,"create"]);

           // New Appointment - Store
           Route::post('/save-appointment', [AppointmentController::class,"store"]);

           // All Appointments
           Route::get('/appointments', [AppointmentController::class,"index"] );

           // Appointment Edit - View
           Route::get('/appointment-edit/{id}', [AppointmentController::class,"edit"] );

           // Appointment Edit - Store
           Route::post('/appointment-edit', [AppointmentController::class,"update"] );




       // ***************************************************************************

       // Letters

           // New Letter
           Route::get('/new-letter/{id}', [LetterController::class,"create"]);

           // New Letter - Store
           Route::post('/save-letter', [LetterController::class,"store"]);

           // All Letters
           Route::get('/letters', [LetterController::class,"index"] );

       // ***************************************************************************

       // Financial Request

           // New Financial
           Route::get('/new-financial-request/{id}', [FinancialController::class,"create"]);

           // New Financial - Store
           Route::post('/save-financial-request', [FinancialController::class,"store"]);

           // All Financial
           Route::get('/financial-requests', [FinancialController::class,"index"] );

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

       // Terms & Conditions

           // New Terms
           Route::get('/new-terms-conditions', [TermsController::class,"create"]);

           // New Terms - Store
           Route::post('/new-terms-conditions', [TermsController::class,"store"]);

           // All Terms & Conditions
           Route::get('/terms-conditions', [TermsController::class,"index"] );

           // Trigger Term Status
           Route::get('/terms-conditions/status/{id}', [TermsController::class,"triggerStatus"] );

           // Delete Term
           Route::get('/delete-terms-conditions/{id}', [TermsController::class,"destroy"] );

       // ***************************************************************************

       // Waranty Policiy

           // New Waranty Policiy
           Route::get('/new-waranty-policiy', [WarantyController::class,"create"]);

           // New Waranty Policiy - Store
           Route::post('/new-waranty-policiy', [WarantyController::class,"store"]);

           // All Waranty Policies
           Route::get('/waranty-policies', [WarantyController::class,"index"] );

           // Trigger Waranty Policiy Status
           Route::get('/waranty-policies/status/{id}', [WarantyController::class,"triggerStatus"] );

           // Delete Waranty Policiy
           Route::get('/delete-waranty-policies/{id}', [WarantyController::class,"destroy"] );

       // ***************************************************************************

       // Penal Provisions - الأحكام الجزائية

           // New Penal Provisions
           Route::get('/new-penal-provision', [PenalController::class,"create"]);

           // New Penal Provisions - Store
           Route::post('/new-penal-provision', [PenalController::class,"store"]);

           // All Penal Provisions
           Route::get('/penal-provisions', [PenalController::class,"index"] );

           // Trigger Penal Provisions Status
           Route::get('/penal-provisions/status/{id}', [PenalController::class,"triggerStatus"] );

           // Delete Penal Provisions
           Route::get('/delete-penal-provisions/{id}', [PenalController::class,"destroy"] );

       // ***************************************************************************

       // Second Party - واجبات الطرف الثانى

           // New Penal Provisions
           Route::get('/new-second-party', [SecondPartyController::class,"create"]);

           // New Penal Provisions - Store
           Route::post('/new-second-party', [SecondPartyController::class,"store"]);

           // All Penal Provisions
           Route::get('/second-parties', [SecondPartyController::class,"index"] );

           // Trigger Penal Provisions Status
           Route::get('/second-parties/status/{id}', [SecondPartyController::class,"triggerStatus"] );

           // Delete Penal Provisions
           Route::get('/delete-second-parties/{id}', [SecondPartyController::class,"destroy"] );

       // ***************************************************************************

       // Elevator Specifications - مواصفات المصعد

           // New Penal Provisions
           Route::get('/new-elevator-specification', [ElevatorSpecificationsController::class,"create"]);

           // New Penal Provisions - Store
           Route::post('/new-elevator-specification', [ElevatorSpecificationsController::class,"store"]);

           // All Penal Provisions
           Route::get('/elevator-specifications', [ElevatorSpecificationsController::class,"index"] );

           // Trigger Penal Provisions Status
           Route::get('/elevator-specifications/status/{id}', [ElevatorSpecificationsController::class,"triggerStatus"] );

           // Delete Penal Provisions
           Route::get('/delete-elevator-specifications/{id}', [ElevatorSpecificationsController::class,"destroy"] );

       // ***************************************************************************

       // Bank Account - بيانات حساب الشركة

           // Bank Account - View
           Route::get('/bank-account', [BankAccountController::class,"create"]);

           // Bank Account - View
           Route::post('/bank-account', [BankAccountController::class,"store"]);

       // ***************************************************************************

       // Email View

             Route::get('/email', [AppointmentController::class,"email"] );
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
Route::get('/logout', [UsersController::class,"logout"]);
