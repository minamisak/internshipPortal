<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\HRController;

use App\Http\Controllers\PdfController;

use App\Http\Controllers\SupervisorController;


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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/register', [RegistrationController::class, 'index'])->name('register.index');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');



Route::get('/dashboard', [InternController::class, 'dashboard'])->name('dashboard');
// Route::get('/intern', [InternController::class, 'secondRegistration'])->name('secondRegistration');

Route::get('/intern/profile/{id}', [InternController::class, 'showProfile'])->name('intern.profile')->middleware('check.session');

Route::get('/adminDashboard', [InternController::class, 'adminDashboard'])->name('adminDashboard');
Route::get('/interns/{id}/accept', [InternController::class, 'accept'])->name('interns.accept');

Route::get('/feedback/{internId}', [InternController::class, 'showFeedbackForm'])->name('feedback.form');
Route::get('/feedbackstore', [InternController::class, 'storeFeedback'])->name('intern.feedbackstore');



Route::get('/hr', [InternController::class, 'hrDashBoard'])->name('hrdashboard')->middleware('check.session');
Route::get('/hr/assign', [HRController::class, 'assignPage'])->name('assignpage');
Route::get('/assignStudent', [HRController::class, 'assign'])->name('assignStudent');
Route::post('/supervisors', [HRController::class, 'addNewUserAdmin'])->name('supervisors.store');
Route::get('/hr/supervisors', [HRController::class, 'getAllSupervisors'])->name('supervisors.all');
//get-users-interns
Route::get('/hr/getUsersInterns', [HRController::class, 'getUsersAndInterns'])->name('get-users-interns');
Route::get('/hr/assignedview', [HRController::class, 'showAssignedStudent'])->name('assignedview');
Route::get('/hr/reomve-interns/{id}', [HRController::class, 'removeAssignedStudent'])->name('interns.remove');
Route::get('/hr/reomve-supervisor/{id}', [HRController::class, 'removeSupervisors'])->name('supervisors.remove');
//remove student from system
Route::get('/hr/reomve-intern/{id}', [HRController::class, 'removeStudent'])->name('intern.remove');

//supervisorsDashboard

Route::post('/reset-password/{userId}', [SupervisorController::class, 'resetPassword'])->name('resetPassword');
Route::get('/supervisor', [InternController::class, 'supervisorView'])->name('supervisor');
Route::get('/supervisorfeedback/{userId}/{interid}', [SupervisorController::class, 'supervisorfeedbackstoreView'])->name('supervisor.feedback');
Route::post('/supervisorfeedback/store', [SupervisorController::class, 'supervisorfeedbackstore'])->name('feedback.store');

//Import users
Route::post('/import', [HRController::class, 'import'])->name('import.data');


// Export Interns
Route::get('/export/interns', [InternController::class, 'exportInterns'])->name('exportInterns');
Route::get('/export/acceptedinterns', [InternController::class, 'exportAcceptedInterns'])->name('exportAcceptedInterns');
Route::get('/check-email', [InternController::class, 'checkMail'])->name('check.email');

Route::match(['get', 'post'],'/logout', [InternController::class, 'logout'])->name('logout');
// Route::post('/login', [InternController::class, 'processLogin'])->name('processLogin');
Route::match(['get', 'post'], '/login', [InternController::class, 'processLogin'])->name('processLogin');

// generate certificate

Route::get('/generatepdf/{userId}', [PdfController::class, 'generatePdf'])->name('generate.pdf');




