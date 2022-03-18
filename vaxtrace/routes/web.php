<?php

use App\Http\Controllers\Vaxtracing\Auth\AuthController;
use App\Http\Controllers\Vaxtracing\JsonDataController;
use App\Http\Controllers\Vaxtracing\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Vaxtracing\PeopleController;
use App\Http\Controllers\Vaxtracing\DashboardController;
use App\Http\Controllers\Vaxtracing\PermissionController;
use App\Http\Controllers\Vaxtracing\RoleController;
use App\Http\Controllers\Vaxtracing\SubCategoryController;
use App\Http\Controllers\Vaxtracing\SubSystemController;
use App\Http\Controllers\Vaxtracing\VaccineeController;
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
        $total_role = Role::get();
        return view('Vaxtracing.admin.UpdatePerson.index', compact('total_role'));
    })->name('get_update_user');

    //Generate address
    Route::get("/create/get_address", [JsonDataController::class, "index"])->name('get_address');

    Route::get("/get-activity-logs", [JsonDataController::class, "getActivity"])->name('get_activity');

    Route::get("/get-vaccinees", [JsonDataController::class, "getVaccinees"])->name('get_vaccinees');

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


    //TRACKER MAIN SYSTEM

    Route::get('/view/Tracker-Main-System/vaccinees/non-verified', function () {
        return view('Vaxtracing.admin.TrackingSystem.ListForNonVerified.index');
    })->name('view_vaccinees_ListForNonVerified');
    

    Route::get('/view/Tracker-Main-System/vaccinees/verified', function () {
        return view('Vaxtracing.admin.TrackingSystem.ListForVerified.index');
    })->name('view_vaccinees_ListForVerified');

    Route::get('/view/Tracker-Main-System/vaccinees/VaccineeMasterList', function () {
        return view('Vaxtracing.admin.TrackingSystem.VaccineeMasterList.index');
    })->name('view_vaccinees_VaccineeMasterList');
    

    Route::resource('vaccinee', VaccineeController::class);

    Route::post('/update/vaccinee/save/{id?}', [VaccineeController::class, 'update'])->name('save_update_vaccinee');

    Route::post('/delete/vaccinee/{id?}', [VaccineeController::class, 'destroy'])->name('delete_vaccinee');

    Route::get('/show/vaccinee/{id?}', [VaccineeController::class, 'show'])->name('show_vaccinee');

    Route::get('/monitor/vaccinee/{id?}', [VaccineeController::class, 'monitor'])->name('monitor_vaccinee');

    Route::get('/view/Tracker-Main-System/vaccinees/status/category', function () {
        return view('Vaxtracing.admin.TrackingSystem.Category.index');
    })->name('view_vaccinees_status_category');

    Route::resource('category', CategoryController::class);

    Route::post('/update/category/save/{id?}', [CategoryController::class, 'update'])->name('save_update_category');

    Route::post('/delete/category/{id?}', [CategoryController::class, 'destroy'])->name('delete_category');

    Route::get('/show/category/{id?}', [CategoryController::class, 'show'])->name('show_category');

    Route::get('/view/Tracker-Main-System/vaccinees/status/sub-category', function () {
        return view('Vaxtracing.admin.TrackingSystem.SubCategory.index');
    })->name('view_vaccinees_status_sub-category');

    Route::resource('sub_category', SubCategoryController::class);

    Route::post('/update/sub_category/save/{id?}', [SubCategoryController::class, 'update'])->name('save_update_sub_category');

    Route::post('/delete/sub_category/{id?}', [SubCategoryController::class, 'destroy'])->name('delete_sub_category');

    Route::get('/show/sub_category/{id?}', [SubCategoryController::class, 'show'])->name('show_sub_category');


    Route::get('/view/Tracker-Main-System/vaccinees/transaction_summary/{id?}', [VaccineeController::class, 'viewTransact'])->name('view_transaction_summary');


    //END OF TRACKER MAIN SYSTEM
});

