<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Artist\ArtistController;
use App\Http\Controllers\Manager\ManagerController;



Route::get('/', function () {
    return view('welcome');
});

 

//Admin route Start//
Route::middleware(['admin'])->group(function(){
    Route::get('Admindashboard', [AdminController::class, 'Admindashboard'])->name('Admindashboard');
    Route::get('category', [AdminController::class, 'category']);
    Route::post('/insertcategory', [AdminController::class, 'insertcategory']);
    Route::get('/addartist', [AdminController::class, 'addartist']);


    Route::get('/edit-artist/{id}', [AdminController::class, 'editartist']);
    Route::put('update-artist/{id}', [AdminController::class, 'updateartist']);

    Route::post('/insertartist', [AdminController::class, 'insertartist']);
    Route::get('/active-artist/{id}', [AdminController::class, 'active_artist']);
    Route::get('/profile', [AdminController::class, 'profile']);
    Route::put('/update_admin/{id}', [AdminController::class, 'update_admin']);
    Route::get('/userslist', [AdminController::class, 'userslist']);
    Route::get('/artistevents', [AdminController::class, 'artistevents']); 


    Route::get('/manager-list', [AdminController::class, 'managerlist']);



});

Route::get('admin', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class,'checklogin']);
Route::get('/register', [AdminController::class, 'register']);
Route::post('/register', [AdminController::class, 'store']);
Route::get('/logout', [AdminController::class,'logout']);

//Artist route Start//
Route::middleware(['artist'])->group(function(){
    Route::get('Artistdashboard', [ArtistController::class, 'Artistdashboard'])->name('Artistdashboard');
    Route::get('/artistprofile', [ArtistController::class, 'artistprofile']);
    Route::put('/update_artist/{id}', [ArtistController::class, 'update_artist']);
    Route::get('/events', [ArtistController::class, 'events']);
    Route::post('/events', [ArtistController::class, 'postevents']);
});

Route::get('artist', [ArtistController::class, 'artistlogin']);
Route::post('artist/login', [ArtistController::class,'login_artis']);
Route::get('/Artist_logout', [ArtistController::class,'logout']);

//Artist route Ends//

//Manager route Start//
   Route::middleware(['manager'])->group(function(){
    Route::get('Managerdashboard', [ManagerController::class, 'Managerdashboard'])->name('Managerdashboard');
    Route::get('/managerprofile', [ManagerController::class, 'managerprofile']);
    });

    Route::get('/manager', [ManagerController::class, 'login']);
    Route::get('/manager/register', [ManagerController::class, 'register']);
    Route::post('/manager/register', [ManagerController::class, 'managerregister'])->name('manager-register');
    Route::post('manager/login', [ManagerController::class,'login_manager']);
    Route::get('/manager_logout', [ManagerController::class,'logout']);

//Manager route Ends//