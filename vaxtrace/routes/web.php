<?php

use App\Http\Controllers\Vaxtracing\Auth\AuthController;
use App\Http\Controllers\Vaxtracing\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vaxtracing\PeopleController;
use App\Http\Controllers\Vaxtracing\DashboardController;


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

Route::get('/', function () { return view('index'); });

// Auth
Route::post("/check", [AuthController::class, "login"])->name('submit-login');

Route::view('/user-login', 'Vaxtracing.auth.Login.index')->name('view-login');

Route::get('/logout', [AuthController::class, "logout"])->name('logout');


//MIDDLEWARE
Route::group(['middleware' => ['AuthCheck']],function(){

    //DASHBOARD
    Route::get('/dashboard', [PeopleController::class, 'getDashboardData'])->name('get_admin_dashboard');

    //MANAGER USER
    Route::view('/manage/user', 'Vaxtracing.admin.ManageUser.index')->name('get_manage_user');

    Route::resource('people', PeopleController::class);

    Route::view('/create/user', 'Vaxtracing.admin.CreatePerson.index')->name('get_create_user');

    Route::view('/update/user', 'Vaxtracing.admin.UpdatePerson.index')->name('get_update_user');

    //Generate address
    Route::get("/create/get_address", [AddressController::class, "index"])->name('get_address');

    // List of user
    Route::post("/create/people", [PeopleController::class, "store"]);

    Route::get("/show/people", [PeopleController::class, "index"])->name('get_people');

    Route::get("/show/deleted_people", [PeopleController::class, "showDeletedPeople"])->name('get_deleted_people');

    Route::get("/show/restored_people", [PeopleController::class, "showRestoredPeople"])->name('get_restored_people');

    Route::get('/show/people/{user_id?}', [PeopleController::class, 'show'])->name('show_people');

    Route::get('/update/people/{user_id?}', [PeopleController::class, 'edit'])->name('update_people');

    Route::post('/update/people/save/{user_id?}', [PeopleController::class, 'update'])->name('save_update_people');

    Route::post('/delete/people/{user_id?}', [PeopleController::class, 'destroy'])->name('delete_people');

    Route::post('/restore/people/{user_id?}', [PeopleController::class, 'restore'])->name('restore_people');

    Route::resource('people', PeopleController::class);
});

