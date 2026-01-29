<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\BlogController;
use App\Models\Category;
use App\Models\Event;

Route::get('/', function () {
    $categories = Category::latest()->take(6)->get();
    $events = Event::with('postable')->latest()->take(6)->get();
    return view('welcome', compact('categories', 'events'));
});

// Blog (all posts dynamic)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');



//Admin route Start//
Route::middleware(['admin'])->group(function () {
    Route::get('Admindashboard', [AdminController::class, 'Admindashboard'])->name('Admindashboard');
    Route::get('category', [AdminController::class, 'category']);
    Route::post('/insertcategory', [AdminController::class, 'insertcategory']);
    Route::get('/adduser', [AdminController::class, 'adduser']);
    Route::get('/edit-user/{id}', [AdminController::class, 'edituser']);
    Route::put('update-user/{id}', [AdminController::class, 'updateuser']);
    Route::post('/insertuser', [AdminController::class, 'insertuser']);
    Route::get('/active-user/{id}', [AdminController::class, 'active_user']);
    Route::get('/profile', [AdminController::class, 'profile']);
    Route::put('/update_admin/{id}', [AdminController::class, 'update_admin']);
    Route::get('/userslist', [AdminController::class, 'userslist']);
    Route::get('/userevents', [AdminController::class, 'userevents']);
    Route::get('/manager-list', [AdminController::class, 'managerlist']);
    Route::get('/admin/events', [AdminController::class, 'adminEvents'])->name('admin.events');
    Route::post('/admin/events', [AdminController::class, 'postAdminEvents']);
});

Route::get('admin', [AdminController::class, 'login']);
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'checklogin']);
Route::get('/register', [AdminController::class, 'register']);
Route::post('/register', [AdminController::class, 'store']);
Route::get('/logout', [AdminController::class, 'logout']);

//User route Start//
Route::middleware(['user'])->group(function () {
    Route::get('Userdashboard', [UserController::class, 'Userdashboard'])->name('Userdashboard');
    Route::get('/userprofile', [UserController::class, 'userprofile']);
    Route::put('/update_user/{id}', [UserController::class, 'update_user']);
    Route::get('/events', [UserController::class, 'events']);
    Route::post('/events', [UserController::class, 'postevents']);
});
Route::get('user', [UserController::class, 'userlogin']);
Route::post('user/login', [UserController::class, 'login_user']);
Route::get('/User_logout', [UserController::class, 'logout']);
//User route Ends//
//Manager route Start//
Route::middleware(['manager'])->group(function () {
    Route::get('Managerdashboard', [ManagerController::class, 'Managerdashboard'])->name('Managerdashboard');
    Route::get('/managerprofile', [ManagerController::class, 'managerprofile']);
    Route::get('/manager/events', [ManagerController::class, 'managerEvents'])->name('manager.events');
    Route::post('/manager/events', [ManagerController::class, 'postManagerEvents']);
});

Route::get('/manager', [ManagerController::class, 'login']);
Route::get('/manager/register', [ManagerController::class, 'register']);
Route::post('/manager/register', [ManagerController::class, 'managerregister'])->name('manager-register');
Route::post('manager/login', [ManagerController::class, 'login_manager']);
Route::get('/manager_logout', [ManagerController::class, 'logout']);

 //Manager route Ends//