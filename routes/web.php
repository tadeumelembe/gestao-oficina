<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);

    Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars');
    Route::get('/cars/show/{id}', [App\Http\Controllers\CarController::class, 'show'])->name('cars.show');
    Route::post('/cars/create', [App\Http\Controllers\CarController::class, 'store'])->name('cars.store');
    Route::post('/cars/getCars/', [App\Http\Controllers\CarController::class, 'getCars'])->name('getCars');
    Route::put('/cars/delete/{id}', [App\Http\Controllers\CarController::class, 'destroy'])->name('cars.delete');
    Route::get('/cars/jobs/{id}', [App\Http\Controllers\CarController::class, 'jobs'])->name('cars.jobs');


    Route::get('/customers/singulars', [App\Http\Controllers\CustomerController::class, 'singulars'])->name('customers.singulars');
    Route::get('/customers/companies', [App\Http\Controllers\CustomerController::class, 'companies'])->name('customers.companies');
    Route::get('/customers/show/{id}', [App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');

    Route::post('/customers/create', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::post('/customers/getCustomers/', [App\Http\Controllers\CustomerController::class, 'getCustomers'])->name('getCustomers');
    Route::get('/customers/jobs/{id}', [App\Http\Controllers\CustomerController::class, 'jobs'])->name('customers.jobs');
    Route::get('/customers/cars/{id}', [App\Http\Controllers\CustomerController::class, 'cars'])->name('customers.cars');
    Route::get('/customers/counts/{id}', [App\Http\Controllers\CustomerController::class, 'counts'])->name('customers.counts');
    Route::get('/customers/sums/{id}', [App\Http\Controllers\CustomerController::class, 'sums'])->name('customers.sums');
    Route::put('/customers/delete/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.delete');


    Route::get('/jobs', [App\Http\Controllers\JobCardController::class, 'index'])->name('jobs');
    Route::get('/jobs/pendentes', [App\Http\Controllers\JobCardController::class, 'pendente'])->name('jobs.pendentes');
    Route::get('/jobs/emCurso', [App\Http\Controllers\JobCardController::class, 'emCurso'])->name('jobs.emCurso');
    Route::get('/jobs/fechados', [App\Http\Controllers\JobCardController::class, 'fechado'])->name('jobs.fechados');
    Route::get('/jobs/getActivity/{id}', [App\Http\Controllers\JobCardController::class, 'getActivity'])->name('jobs.getActivity');
    Route::get('/jobs/start/{id}', [App\Http\Controllers\JobCardController::class, 'start'])->name('jobs.start');
    Route::get('/jobs/close/{id}', [App\Http\Controllers\JobCardController::class, 'close'])->name('jobs.close');
    Route::post('/jobs/file/upload/{id}', [App\Http\Controllers\JobCardController::class, 'fileUpload'])->name('jobs.upload');
    Route::post('/jobs/file/remove/{id}', [App\Http\Controllers\JobCardController::class, 'fileRemove'])->name('jobs.fileRemove');
    Route::put('/jobs/delete/{id}', [App\Http\Controllers\JobCardController::class, 'destroy'])->name('jobs.delete');


    Route::get('/jobs/create', [App\Http\Controllers\JobCardController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/store', [App\Http\Controllers\JobCardController::class, 'store'])->name('jobs.store');
    Route::post('/jobs/update', [App\Http\Controllers\JobCardController::class, 'update'])->name('jobs.update');
    Route::get('/jobs/show/{id}', [App\Http\Controllers\JobCardController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/edit/{id}', [App\Http\Controllers\JobCardController::class, 'edit'])->name('jobs.edit');
    Route::post('/jobs/changeStatus', [App\Http\Controllers\JobCardController::class, 'changeStatus'])->name('jobs.changeStatus');

    Route::post('/employees/getEmployees/', [App\Http\Controllers\EmployeeController::class, 'getEmployees'])->name('getEmployees');
    Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
    Route::post('/employees/create', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
    Route::put('/employees/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.delete');

    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');

    Route::post('/actividade/store', [App\Http\Controllers\ActividadeController::class, 'store'])->name('actividade.store');
    Route::post('/actividade/image/upload/{id}', [App\Http\Controllers\ActividadeController::class, 'imageUpload'])->name('actividade.image');
    Route::get('/actividade/getActivity/{id}', [App\Http\Controllers\ActividadeController::class, 'getActividade'])->name('actividade.getActivity');
    Route::post('/actividade/changeStatus', [App\Http\Controllers\ActividadeController::class, 'iniciarActividade'])->name('actividade.changeStatus');
    Route::post('/actividade/addFuncionario', [App\Http\Controllers\ActividadeController::class, 'addFuncionario'])->name('actividade.addFuncionario');

    Route::post('/consumivel/store', [App\Http\Controllers\ConsumivelController::class, 'store'])->name('consumivel.store');

    Route::put('/consumivel/delete/{id}', [App\Http\Controllers\ConsumivelController::class, 'delete'])->name('consumivel.delete');

    Route::get('/dashboard/total', [App\Http\Controllers\DashboardController::class, 'totalJobcards'])->name('customers.counts');

});
