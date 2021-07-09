<?php

use App\Models\CreateWorkspace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\CreateWorkspaceProjects;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateWorkspaceController;
use App\Http\Controllers\CreateTicketCardController;
use App\Http\Controllers\CreateTicketLableController;
use App\Http\Controllers\CreateTicketTransectionController;
use App\Http\Controllers\CreateWorkspaceProjectsController;


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
    return view('auth/login');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'show'])->name('home');
// Route::get('/layout', [HomeController::class, 'show'])->name('layout');


// ***********Workspace*********
Route::get('CreateWorkspacePage', [CreateWorkspaceController::class, 'index']);
Route::get('set-current-workspace/{id}', [CreateWorkspaceController::class, 'setWorkspace']);
Route::post('CreateWorkspace', [CreateWorkspaceController::class, 'create'])->name('createworkspace');
Route::post('addmembers', [CreateWorkspaceController::class, 'addmembers']);


// ********Board**********
Route::post('CreateWorkspaceProjects', [CreateWorkspaceProjectsController::class, 'store'])->name('createproject');

// ********Ticket Transection********
Route::post('CreateTicketTransection', [CreateTicketTransectionController::class, 'store'])->name('createticketTransection');
Route::post('CreateTicketCard', [CreateTicketCardController::class, 'store'])->name('createticketCard');
Route::post('addDescription/{id}', [CreateTicketCardController::class, 'descriptionUpdate'])->name('descriptionCard');
Route::post('addCardmembers', [CreateTicketCardController::class, 'addCardmembers']);



Route::post('/addCardLabels', [CreateTicketLableController::class, 'store'])->name('addCardLabels');
Route::post('/addLabelToCard', [CreateTicketLableController::class, 'addLabelToCard'])->name('addLabelToCard');

Route::get('search/keyword', [HomeController::class, 'search'])->name('search');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');