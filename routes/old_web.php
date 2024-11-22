<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MasterController;
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

Route::any('/browseFebrics', [HomeController::class, 'browseFebrics'])->name('browseFebrics');
Route::any('/febricMarchent', [HomeController::class, 'febricMarchent'])->name('febricMarchent');

/**********************[ WEB SITE ROUTING START ]****************************/
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/google/redirectvend', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogleVendor'])->name('google.redirectvend');
Route::get('/google/callbackvendor', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallbackVendor'])->name('google.callbackvend');

Route::get('/register',[HomeController::class, 'register']);
Route::post('/signup',[HomeController::class, 'signup'])->name('signup');
Route::get('/login',[HomeController::class, 'login']);
Route::post('/loginchk', [HomeController::class, 'loginchk'])->name('customerlogin');



Route::any('/vendorLogin', [HomeController::class, 'vendorLogin'])->name('vendorLoginForm');
Route::any('/vendorSignup', [HomeController::class, 'vendorSignup'])->name('vendorSignupForm');
Route::get('/vendors',[HomeController::class, 'vendors']);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['web','checkUser']],function(){
    Route::get('/customer',[HomeController::class, 'customer']);
});

/**********************[ WEB SITE ROUTING END ]****************************/

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

    //vip customer
    Route::get('/admin/vip-customer-view/{id}', [ManagementController::class, 'vip_customer_view'])->name('admin.vip_customer_view');
    Route::get('/admin/vip-customer-list', [ManagementController::class, 'vip_customer_list'])->name('admin.vip_customer_list');
    Route::get('/admin/vip-customer-form', [ManagementController::class, 'vipCustomerForm'])->name('admin.vip_customer_form');
    Route::get('/admin/vip-customer-edit/{id}', [ManagementController::class, 'vipCustomeredit'])->name('admin.vip_customer_edit');
    Route::post('/admin/vipcustomer_formAction', [ManagementController::class, 'vipCustomerFormAction'])->name('admin.vipcustomerFormAction');

   //tailor management
   Route::get('/admin/tailor-list', [ManagementController::class, 'tailor_list'])->name('admin.tailor_list');
   Route::get('/admin/tailor-form', [ManagementController::class, 'tailorForm'])->name('admin.tailor_form');
   Route::post('/admin/tailorFormAction', [ManagementController::class, 'tailorFormAction'])->name('admin.tailorFormAction');
   Route::get('/admin/delete-vendor-list/{id}', [ManagementController::class, 'delete_vendor_list'])->name('admin.delete_vendor_list');
   Route::post('/admin/vendor-status', [ManagementController::class, 'vendorStatus'])->name('admin.vendorStatus');
   Route::post('/admin/vendor-filter', [ManagementController::class, 'vendorFilter'])->name('admin.vendorFilter');
   Route::get('/admin/tailor-view/{id}', [ManagementController::class, 'tailor_view'])->name('admin.tailor_view');
   Route::get('/admin/tailor-edit/{id}', [ManagementController::class, 'tailor_edit'])->name('admin.tailor_edit');



    Route::get('/admin/user-list', [ManagementController::class, 'user_list'])->name('admin.user_list');
    Route::post('/admin/user_editaction', [ManagementController::class, 'user_editaction'])->name('admin.user_editaction');

    Route::get('/admin/student-view/{id}', [ManagementController::class, 'studentview'])->name('admin.studentView');

    Route::get('/admin/study-material', [ManagementController::class, 'studyMaterial'])->name('admin.study_material');
    Route::get('/admin/document-list/{id}', [ManagementController::class, 'documentList'])->name('admin.documentList');
    Route::get('/admin/add-document/{id?}', [ManagementController::class, 'addDocument'])->name('admin.addDocument');
    Route::post('/admin/add-document', [ManagementController::class, 'addDocumentAction'])->name('admin.addDocumentAction');

    
    /********************[Master Route ]*************************/
    Route::get('/admin/getSize', [MasterController::class, 'getSize'])->name('getSize');
    Route::any('/admin/addSize/{id?}', [MasterController::class, 'addSize'])->name('addSize');
    Route::post('/admin/changesizeStatus', [MasterController::class, 'changesizeStatus'])->name('changesizeStatus');
    Route::get('/admin/deleteSize/{id}', [MasterController::class, 'deleteSize'])->name('deleteSize');

    Route::get('/admin/getColor', [MasterController::class, 'getColor'])->name('getColor');
    Route::any('/admin/addColor/{id?}', [MasterController::class, 'addColor'])->name('addColor');
    Route::post('/admin/changeColorStatus', [MasterController::class, 'changeColorStatus'])->name('changeColorStatus');
    Route::get('/admin/deleteColor/{id}', [MasterController::class, 'deleteColor'])->name('deleteColor');

    Route::get('/admin/getSpeciality', [MasterController::class, 'getSpeciality'])->name('getSpeciality');
    Route::any('/admin/addSpeciality/{id?}', [MasterController::class, 'addSpeciality'])->name('addSpeciality');
    Route::post('/admin/changeSpecialityStatus', [MasterController::class, 'changeSpecialityStatus'])->name('changeSpecialityStatus');
    Route::get('/admin/deleteSpeciality/{id}', [MasterController::class, 'deleteSpeciality'])->name('deleteSpeciality');

    Route::get('/admin/getFebricType', [MasterController::class, 'getFebricType'])->name('getFebricType');
    Route::any('/admin/addFebricType/{id?}', [MasterController::class, 'addFebricType'])->name('addFebricType');
    Route::post('/admin/changeFebricTypeStatus', [MasterController::class, 'changeFebricTypeStatus'])->name('changeFebricTypeStatus');
    Route::get('/admin/deleteFebricType/{id}', [MasterController::class, 'deleteFebricType'])->name('deleteFebricType');

    Route::get('/admin/getPlans', [MasterController::class, 'getPlans'])->name('getPlans');
    Route::any('/admin/addPlan/{id?}', [MasterController::class, 'addPlan'])->name('addPlan');
    Route::post('/admin/changePlanStatus', [MasterController::class, 'changePlanStatus'])->name('changePlanStatus');
    Route::get('/admin/deletePlan/{id}', [MasterController::class, 'deletePlan'])->name('deletePlan');

    Route::get('/admin/getCategory', [MasterController::class, 'getCategory'])->name('getCategory');
    Route::any('/admin/addCategory/{id?}', [MasterController::class, 'addCategory'])->name('addCategory');
    Route::post('/admin/changeCategoryStatus', [MasterController::class, 'changeCategoryStatus'])->name('changeCategoryStatus');
    Route::get('/admin/deleteCategory/{id}', [MasterController::class, 'deleteCategory'])->name('deleteCategory');

});


//coutnr_detail_route
Route::get('/getcountry', [ManagementController::class, 'getcountry'])->name('show.getcountry');
Route::POST('/getstate ', [ManagementController::class, 'getstate']);
Route::POST('/getcity ', [ManagementController::class, 'getcity']);


