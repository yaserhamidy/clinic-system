<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\medicineCategoryController;
use App\Http\Controllers\medicineController;
use App\Http\Controllers\bayController;
use App\Http\Controllers\sellController;




Route::get('/', function () {
    return view('first_page');
})->name('first_page');

Route::middleware(['middleware' => 'PrevenBackHistory'])->group(function(){
    Auth::routes();
});



// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PrevenBackHistory']], function () {
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    // catagory routes
    Route::get('category-show', [categoryController::class, 'show'])->name('category-show');
    Route::get('category-add', [categoryController::class, 'add'])->name('category-add');
    Route::post('addCategory', [categoryController::class, 'addCategory'])->name('addCategory');
    Route::get('/categoryDelete/{cat_id}', [categoryController::class , 'categoryDelete'])->name('categoryDelete');
    Route::get('/categoryEdit/{cat_id}', [categoryController::class , 'categoryEdit'])->name('categoryEdit');
    Route::post('EditCategory', [categoryController::class, 'EditCategory'])->name('EditCategory');
    Route::get('/search/categories', [CategoryController::class, 'search'])->name('search.categories');
    // doctor routes
    Route::get('doctor-show', [DoctorController::class, 'show'])->name('doctor-show');
    Route::get('doctor-add', [DoctorController::class, 'add'])->name('doctor-add');
    Route::post('addDoctor', [DoctorController::class, 'addDoctor'])->name('addDoctor');
    Route::get('/doctorDelete/{doctor_id}', [DoctorController::class , 'doctorDelete'])->name('doctorDelete');
    Route::get('/doctorEdit/{doctor_id}', [DoctorController::class , 'doctorEdit'])->name('doctorEdit');
    Route::post('EditDoctor', [DoctorController::class, 'editDoctor'])->name('EditDoctor');
    
    Route::get('doctor-patients/{doctor_id}', [patientController::class, 'patientsByDoctor'])->name('doctor-patients');
    // patient routes
    Route::get('patient-show', [patientController::class, 'show'])->name('patient-show');
    Route::get('patient-add', [patientController::class, 'add'])->name('patient-add');
    Route::post('addPatient', [patientController::class, 'addPatient'])->name('addPatient');
    Route::get('/patientDelete/{patient_id}', [patientController::class , 'patientDelete'])->name('patientDelete');
    Route::get('/patientEdit/{patient_id}', [patientController::class , 'patientEdit'])->name('patientEdit');
    Route::post('/editPatient/{patient_id}', [patientController::class, 'editPatient'])->name('EditPatient');
    Route::post('/completePatient/{patient_id}', [patientController::class, 'completePatient'])->name('completePatient');
    Route::post('/patient/incomplete/{patient_id}', [patientController::class, 'incompletePatient'])->name('patient-incomplete');
    Route::get('patient-complete', [patientController::class, 'completed'])->name('patient-complete');

    // session routes
    Route::get('session-show', [sessionController::class, 'show'])->name('session-show');
    Route::get('session-add', [sessionController::class, 'add'])->name('session-add');
    Route::post('addSession', [sessionController::class, 'addSession'])->name('addSession');
    Route::get('/sessionDelete/{session_id}', [sessionController::class, 'sessionDelete'])->name('sessionDelete');
    Route::get('/sessionEdit/{session_id}', [sessionController::class, 'sessionEdit'])->name('sessionEdit');
    Route::post('editSession', [sessionController::class, 'editSession'])->name('editSession');
    Route::get('/session/details/{patient_id}', [SessionController::class, 'sessionDetails'])->name('session-details');
    // account routes
    Route::get('account-show', [accountController::class, 'show'])->name('account-show');
    Route::get('account-add', [accountController::class, 'add'])->name('account-add');
    Route::post('addAccount', [accountController::class, 'addAccount'])->name('addAccount');
    Route::get('/accountDelete/{account_id}', [accountController::class, 'accountDelete'])->name('accountDelete');
    Route::get('/accountEdit/{account_id}', [accountController::class, 'accountEdit'])->name('accountEdit');
    Route::post('editAccount', [accountController::class, 'editAccount'])->name('editAccount');
    // payment routes
    Route::get('payment-show', [paymentController::class, 'show'])->name('payment-show');
    Route::get('payment-add', [paymentController::class, 'add'])->name('payment-add');
    Route::post('addPayment', [paymentController::class, 'addPayment'])->name('addPayment');
    Route::get('/paymentDelete/{payment_id}', [paymentController::class, 'paymentDelete'])->name('paymentDelete');
    Route::get('/paymentEdit/{payment_id}', [paymentController::class, 'paymentEdit'])->name('paymentEdit');
    Route::post('editPayment', [paymentController::class, 'editPayment'])->name('editPayment');
    Route::get('/payment/details/{patient_id}', [paymentController::class, 'paymentDetails'])->name('payment-details');
    // transaction routes
    Route::get('transaction-show', [transactionController::class, 'show'])->name('transaction-show');
    // MedicineCategory routes
    Route::get('medicineCategory-show', [medicineCategoryController::class, 'show'])->name('medicineCategory-show');
    Route::get('medicineCategory-add', [medicineCategoryController::class, 'add'])->name('medicineCategory-add');
    Route::post('addMedicineCategory', [medicineCategoryController::class, 'addMedicineCategory'])->name('addMedicineCategory');
    Route::get('/medicineCategoryDelete/{medicineCat_id}', [medicineCategoryController::class, 'medicineCategoryDelete'])->name('medicineCategoryDelete');
    Route::get('/medicineCategoryEdit/{medicineCat_id}', [medicineCategoryController::class, 'medicineCategoryEdit'])->name('medicineCategoryEdit');
    Route::post('editMedicineCategory', [medicineCategoryController::class, 'editMedicineCategory'])->name('editMedicineCategory');

// Medicine routes
Route::get('medicine-show', [medicineController::class, 'show'])->name('medicine-show');
Route::get('medicine-add', [medicineController::class, 'add'])->name('medicine-add');
Route::post('addMedicine', [medicineController::class, 'addMedicine'])->name('addMedicine');
Route::get('/medicineDelete/{medicine_id}', [medicineController::class, 'medicineDelete'])->name('medicineDelete');
Route::get('/medicineEdit/{medicine_id}', [medicineController::class, 'medicineEdit'])->name('medicineEdit');
Route::post('editMedicine', [medicineController::class, 'editMedicine'])->name('editMedicine');

// Route to show the buy medicine form
Route::get('/buy-medicine', [medicineController::class, 'showBuyForm'])->name('buyMedicineForm');

// Route to handle the purchase
Route::post('/buy-medicine', [medicineController::class, 'buyMedicine'])->name('buyMedicine');

// Route to show purchases
Route::get('/bay-show', [bayController::class, 'showPurchases'])->name('bay-show');


Route::get('/sales', [sellController::class, 'showSales'])->name('sell.show');
Route::get('/sales/create', [sellController::class, 'create'])->name('sell.create');
Route::post('/sales', [sellController::class, 'store'])->name('sell.store');
// Route::delete('/sales/{sell}', [sellController::class, 'destroy'])->name('sell.destroy');

});

// User routes

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PrevenBackHistory']], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
      Route::get('/profile', [HomeController::class, 'profile'])->name('user.profile');

    
   
}); 





Route::get('/welcome', [HomeController::class, 'showExamPage'])->name('welcome');




 









