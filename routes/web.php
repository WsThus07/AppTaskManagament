<?php

use App\Http\Controllers\StaticController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTaskController;


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
//-----Fatima----------------
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);




use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\ManagerDashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskProjectController;
use App\Http\Controllers\UserDashController;

Route::middleware('auth:web')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('auth:web')->prefix('manager')->group(function () {
    Route::get('/dashboard', [ManagerDashController::class, 'dashboard'])->name('manager.dashboard');
});

Route::middleware('auth:web')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashController::class, 'dashboard'])->name('user.dashboard');
});



/* Dashboard*/

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'analyticsDashboard'])->name('admin.dashboard');
use App\Http\Controllers\ManagerDashboardController;



//--------------------------------------------------------------
Route::resource('users', UserController::class);
Route::get('us',[UserController::class ,'index_man'])->name('us');

Route::resource('projects', ProjectController::class);
Route::resource('projects_tasks', ProjectTaskController::class);
Route::get('projects_tasks/{id}/view_tasks', [ProjectTaskController::class, 'view_tasks'])->name('projects_tasks.view_tasks');
Route::get('projects_tasks/{id}/create_task', [ProjectTaskController::class, 'create_task'])->name('projects_tasks.create_task');

Route::post('projects_tasks/store_task', [ProjectTaskController::class, 'store_task'])->name('projects_tasks.store_task');
Route::resource('Ptasks',TaskProjectController::class);
Route::get('Ptasks/{Ptask}', [TaskProjectController::class, 'show'])->name('Ptasks.show');

Route::resource('profile',ProfileController::class);


//----------------------------
//Route::resource('manager', ManagerController::class);

//Route for login
/*Route::get('/login', function () {
    return view('login');
})->name('login');*/

Route::get('/manager/dashboard', function () {
    return view('manager.dashboard');
})->name('manager.dashboard');


Route::get('/manager/profile', function () {
    return view('manager.profile');
})->name('manager.profile');

Route::get('/manager/editProfile', function () {
    return view('manager.editProfile');
})->name('manager.editProfile');

Route::get('/manager/users', function () {
    return view('manager.users');
})->name('manager.users');

Route::get('/manager/projects', function () {
    return view('manager.projects');
})->name('manager.projects');
Route::get('/manager/addTask', function () {
    return view('manager.addTask');
})->name('manager.addTask');
Route::get('/manager/editProject', function () {
    return view('manager.editProject');
})->name('manager.editProject');
Route::get('/manager/view_task', function () {
    return view('manager.view_task');
})->name('manager.view_task');
Route::get('/manager/editTask', function () {
    return view('manager.editTask');
})->name('manager.editTask');

/* Admin routes */

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/admin/profile', function () {
    return view('admin.profile');
})->name('admin.profile');
Route::get('/admin/editProfile', function () {
    return view('admin.editProfile');
})->name('admin.editProfile');
Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');
Route::get('/admin/addUser', function () {
    return view('admin.addUser');
})->name('admin.addUser');
Route::get('/admin/editUser', function () {
    return view('admin.editUser');
})->name('admin.editUser');
Route::get('/admin/addProject', function () {
    return view('admin.addProject');
})->name('admin.addProject');
Route::get('/admin/editProject', function () {
    return view('admin.editProject');
})->name('admin.editProject');
Route::get('/admin/viewTasks', function () {
    return view('admin.viewTasks');
})->name('admin.viewTasks');
Route::get('/admin/projects', function () {
    return view('admin.projects');
})->name('admin.projects');
/* User Routes */

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');
Route::get('/user/profile', function () {
    return view('user.profile');
})->name('user.profile');
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');

Route::get('/user/editProfile', function () {
    return view('user.editProfile');
})->name('user.editProfile');
Route::get('/user/projects', function () {
    return view('user.projects');
})->name('user.projects');
Route::get('/user/viewTasks', function () {
    return view('user.viewTasks');
})->name('user.viewTasks');
Route::get('/user/editTask', function () {
    return view('user.editTask');
})->name('user.editTask');

/*

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function(){
 return view('welcome');

});

Route::get('/store/{category?}/{item?}', function($category = null,$item = null){
    if(isset($category)){
        if(isset($item)){
            return"<h1>{$item}</h1>";
        }
    }
    return '<h1>the style choised is :</h1><h2 style="color:red">Store</h2>';

   });


Route::get('/about', function(){
    $filter=request('style');
 if(isset($filter)){
        return '<h1>the style choised is :</h1><h2 style="color:red">'.strip_tags($filter).'</h2>';}
        else{
            return '<h1>the style choised is :</h1><h2 style="color:red">all Products</h2>';
        }

   });
*/
