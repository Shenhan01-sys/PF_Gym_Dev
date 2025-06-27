<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin_Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'index']);
Route::get('/admin', [Controller::class, 'login_admin']);
Route::get('/admin/dashboard', [admin_Controller::class, 'index_admin']);
Route::post('/admin/dashboard/addTitle', [admin_Controller::class, 'addTitle']);
Route::put('/admin/dashboard/editTitle/{id}', [admin_Controller::class, 'editTitle']);
Route::delete('/admin/dashboard/deleteTitle', [admin_Controller::class, 'deleteTitle']);
Route::put('/admin/dashboard/editMotivation/{id}', [admin_Controller::class, 'updateMotivation']);
Route::post('/admin/dashboard/addMotivation', [admin_Controller::class, 'addMotivation']);
Route::delete('/admin/dashboard/deleteMotivation', [admin_Controller::class, 'deleteMotivation']);
