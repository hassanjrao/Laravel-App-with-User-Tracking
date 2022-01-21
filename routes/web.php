<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Auth;
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

// Example Routes
Auth::routes(['register' => false]);


Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('pages', PageController::class);

});



// Route::middleware(['auth', 'role:user'])->group(function () {

// });


Route::middleware(['auth', 'role:super-admin'])->prefix("admin")->name("admin.")->group(function () {

    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");

    Route::put("/users/{user_id}/page-access", [UserController::class, "updatePageAccess"])->name("users.updatePageAccess");
    Route::resource("/users", UserController::class);

    Route::put("/pages/{user_id}/page-access", [PageController::class, "updatePageAccess"])->name("pages.updatePageAccess");
    Route::resource('pages', PageController::class);

    Route::get("profile", [ProfileController::class, "index"])->name("profile.index");

    Route::put("profile/{id}/update", [ProfileController::class, "update"])->name("profile.update");

    Route::put("profile/{id}/update-password", [ProfileController::class, "updatePassword"])->name("profile.updatePassword");

});
