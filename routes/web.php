<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [HomeController::class, 'index']);

//admin login
Route::get('/admin', [AuthController::class, 'index']);
Route::post('/adminlogin', [AuthController::class, 'adminlogin'])->name('adminlogin');
Route::get('/adminLogout', [AuthController::class, 'adminLogout'])->name('adminLogout');







Route::group(['middleware'=>['web','checkAdmin']],function(){
     Route::get('/admin/dashboard', [AuthController::class, 'admindashboard'])->name('admindashboard');
     Route::get('/admin/customer-list', [ManagementController::class, 'customer_list'])->name('admin.customer_list');
     Route::get('/admin/customer-form', [ManagementController::class, 'customerForm'])->name('admin.customer_form');
     Route::post('/admin/customer_formAction', [ManagementController::class, 'customerFormAction'])->name('admin.customerFormAction');
     Route::post('/admin/customer-status', [ManagementController::class, 'customerStatus'])->name('admin.customerStatus');
     Route::get('/admin/delete-user-list/{id}', [ManagementController::class, 'delete_user_list'])->name('admin.delete_user_list');
     Route::get('/admin/customer-edit/{id}', [ManagementController::class, 'customer_edit'])->name('admin.customer_edit');
     Route::post('/admin/useremail', [ManagementController::class, 'checkEmailuser'])->name('admin.checkEmailuser');
     Route::get('/admin/customer-view/{id}', [ManagementController::class, 'customer_view'])->name('admin.customer_view');




     Route::get('/admin/user-list', [ManagementController::class, 'user_list'])->name('admin.user_list');


     Route::post('/admin/user_editaction', [ManagementController::class, 'user_editaction'])->name('admin.user_editaction');

     Route::get('/admin/student-view/{id}', [ManagementController::class, 'studentview'])->name('admin.studentView');

     Route::get('/admin/study-material', [ManagementController::class, 'studyMaterial'])->name('admin.study_material');
     Route::get('/admin/document-list/{id}', [ManagementController::class, 'documentList'])->name('admin.documentList');
     Route::get('/admin/add-document/{id?}', [ManagementController::class, 'addDocument'])->name('admin.addDocument');
     Route::post('/admin/add-document', [ManagementController::class, 'addDocumentAction'])->name('admin.addDocumentAction');


});




