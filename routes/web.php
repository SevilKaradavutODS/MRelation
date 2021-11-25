<?php
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmantController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/departmant', [DepartmantController::class, 'index'])->name('departmant');
Route::get('/departmant_create', [DepartmantController::class, 'create'])->name('departmant_create');
Route::post('/departmant', [DepartmantController::class, 'store'])->name('departmant_store');
Route::get('/departmant/edit/{id}', [DepartmantController::class, 'edit'])->name('departmant_edit');
Route::post('/departmant/update/{id}', [DepartmantController::class, 'update'])->name('departmant_update');
Route::get('/departmant_destroy/{id}', [DepartmantController::class, 'destroy'])->name('departmant_destroy');

Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::get('/company_create', [CompanyController::class, 'create'])->name('company_create');
Route::post('/company', [CompanyController::class, 'store'])->name('company_store');
Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('company_edit');
Route::post('/company/update/{id}', [CompanyController::class, 'update'])->name('company_update');
Route::get('/company_destroy/{id}', [CompanyController::class, 'destroy'])->name('company_destroy');

Route::get('/work', [WorkController::class, 'index'])->name('work');
Route::get('/work_create', [WorkController::class, 'create'])->name('work_create');
Route::post('/work', [WorkController::class, 'store'])->name('work_store');
Route::get('/work/edit/{id}', [WorkController::class, 'edit'])->name('work_edit');
Route::post('/work/update/{id}', [WorkController::class, 'update'])->name('work_update');
Route::get('/work_destroy/{id}', [WorkController::class, 'destroy'])->name('work_destroy');

Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::get('/project_create', [ProjectController::class, 'create'])->name('project_create');
Route::post('/project', [ProjectController::class, 'store'])->name('project_store');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project_edit');
Route::post('/project/update/{id}', [ProjectController::class, 'update'])->name('project_update');
Route::get('/project_destroy/{id}', [ProjectController::class, 'destroy'])->name('project_destroy');