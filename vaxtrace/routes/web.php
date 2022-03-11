<?php

use App\Http\Controllers\Vaxtracing\Auth\AuthController;
use App\Http\Controllers\Vaxtracing\AddressController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Vaxtracing\PeopleController;
use App\Http\Controllers\Vaxtracing\DashboardController;
use App\Http\Controllers\Vaxtracing\PermissionController;
use App\Http\Controllers\Vaxtracing\RoleController;
use App\Http\Controllers\Vaxtracing\SubSystemController;
use App\Http\Middleware\AuthCheck;
use App\Models\Vaxtracing\Role;

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
    if(session()->has('LoggedUser')){
        return redirect('/dashboard');
    }
    return view('index'); 
})->name('home');

// Auth
Route::post("/check", [AuthController::class, "login"])->name('submit-login');

Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::get('/user-login', [AuthController::class, "view_login"])->name('view-login');
//MIDDLEWARE
Route::group(['middleware' => ['AuthCheck']],function(){
    

    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('get_admin_dashboard');

    //MANAGER USER
    Route::get('/manage/user',function () {
        abort_if(! session('LoggedUser')->hasPermission('USER_ACCESS'), 403);
        return view('Vaxtracing.admin.ManageUser.index');
    })->name('get_manage_user');
  
    
    Route::resource('people', PeopleController::class);

    Route::get('/create/user', function () {
        abort_if(! session('LoggedUser')->hasPermission('USER_CREATE'), 403);
        $total_role = Role::get();
        return view('Vaxtracing.admin.CreatePerson.index', compact('total_role'));
    })->name('get_create_user');

    Route::get('/update/user', function () {
        abort_if(! session('LoggedUser')->hasPermission('USER_UPDATE'), 403);
        return view('Vaxtracing.admin.UpdatePerson.index');
    })->name('get_update_user');

    //Generate address
    Route::get("/create/get_address", [AddressController::class, "index"])->name('get_address');

    Route::get("/get-activity-logs", [AddressController::class, "getActivity"])->name('get_activity');

    Route::get("/get-vaccinees", [AddressController::class, "getVaccinees"])->name('get_vaccinees');

    //Change Password
    Route::post('/change/password/', [PeopleController::class, 'changePassword'])->name('change_password');

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


    Route::view('/edit/profile', 'Vaxtracing.admin.EditProfile.index')->name('edit_profile');

    Route::post('/edit/profile/save/{user_id?}', [PeopleController::class, 'editProfile'])->name('save_edit_profile');

    Route::get('/view/activity_log',  function () {
        abort_if(! session('LoggedUser')->hasPermission('ACTIVITY_ACCESS'), 403);
        return view('Vaxtracing.admin.ActivityLog.index');
    })->name('view_activity_log');

    Route::get('/view/department', function () {
        abort_if(! session('LoggedUser')->hasPermission('ROLE_ACCESS'), 403);
        return view('Vaxtracing.admin.Department.index');
    })->name('view_department');
    
    Route::get('/view/permission', function () {
        abort_if(! session('LoggedUser')->hasPermission('PERMISSION_ACCESS'), 403);
        return view('Vaxtracing.admin.Permission.index');
    })->name('view_permission');

    Route::get('/view/subsystem', function () {
        abort_if(! session('LoggedUser')->hasPermission('SUBSYSTEM_ACCESS'), 403);
        return view('Vaxtracing.admin.Subsystem.index');
    })->name('view_subsystem');

    // Route::view('/create/department', 'Vaxtracing.admin.CreateDepartment.index')->name('get_create_department');

    //Route::view('/create/permission', 'Vaxtracing.admin.CreatePermission.index')->name('get_create_permission');

    //MANAGE PERMISSION

    Route::resource('role', RoleController::class);

    Route::get('/update/role/{id?}', [RoleController::class, 'edit'])->name('update_department');

    Route::post('/update/role/save/{id?}', [RoleController::class, 'update'])->name('save_update_department');

    Route::post('/delete/role/{id?}', [RoleController::class, 'destroy'])->name('delete_department');

    Route::get("/show/role/{id?}", [RoleController::class, "show"])->name('show_role');

    //MANAGE PERMISSION

    Route::resource('permission', PermissionController::class);

    Route::get('/update/permission/{id?}', [PermissionController::class, 'edit'])->name('update_permission');

    Route::post('/update/permission/save/{id?}', [PermissionController::class, 'update'])->name('save_update_permission');

    Route::post('/delete/permission/{id?}', [PermissionController::class, 'destroy'])->name('delete_permission');

    //MANAGE SUBSYSTEM

    Route::resource('subsystem', SubSystemController::class);

    Route::get('/update/subsystem/{id?}', [SubSystemController::class, 'edit'])->name('update_subsystem');

    Route::post('/update/subsystem/save/{id?}', [SubSystemController::class, 'update'])->name('save_update_subsystem');

    Route::post('/delete/subsystem/{id?}', [SubSystemController::class, 'destroy'])->name('delete_subsystem');

    Route::get('/view/api', function () {
       
        return view('Vaxtracing.admin.TrackingSystem.index');
    })->name('view_api');
});

