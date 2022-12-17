<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// Admin routes
Route::prefix("admin")->group(function () {
    // Auth
    Route::get("/login", [AdminController::class, "AdminLogin"])->name("admin_login");
    Route::post("/login", [AdminController::class, "AdminLoginStore"])->name("admin_login_store");
    Route::get("/logout", [AdminController::class, "AdminLogout"])->name("admin_logout")->middleware('admin');
    Route::get("/register", [AdminController::class, "AdminRegister"])->name("admin_register");
    Route::post("/register", [AdminController::class, "AdminRegisterStore"])->name("admin_register_store");

    // Dashboard
    Route::get("/dashboard", [AdminController::class, "AdminDashboard"])->name("admin_dashboard")->middleware('admin');

    // User Management
    Route::middleware(['admin'])->prefix("users")->group(function () {
        Route::get("/view", [UserController::class, "AdminUserView"])->name("admin_user_view");
        Route::get("/add", [UserController::class, "AdminUserAdd"])->name("admin_user_add");
        Route::post("/add", [UserController::class, "AdminUserAddStore"])->name("admin_user_add_store");
        Route::get("/edit/{id}", [UserController::class, "AdminUserEdit"])->name("admin_user_edit");
        Route::post("/edit/{id}", [UserController::class, "AdminUserEditStore"])->name("admin_user_edit_store");
        Route::get("/delete/{id}", [UserController::class, "AdminUserDelete"])->name("admin_user_delete");
    });

    // Profile
    Route::middleware(['admin'])->prefix("profile")->group(function () {
        Route::get("/view", [AdminProfileController::class, "AdminProfileView"])->name("admin_profile_view");
        Route::get("/edit", [AdminProfileController::class, "AdminProfileEdit"])->name("admin_profile_edit");
        Route::post("/edit", [AdminProfileController::class, "AdminProfileEditStore"])->name("admin_profile_edit_store");

        Route::get('/change-password', [AdminProfileController::class, 'AdminPasswordView'])->name('admin_password_view');
        Route::post('/change-password', [AdminProfileController::class, 'AdminPasswordUpdate'])->name('admin_password_update');
    });
});
// End Admin routes




// Moderator routes
Route::prefix("moderator")->group(function () {
    // Auth
    Route::get("/login", [ModeratorController::class, "ModeratorLogin"])->name("moderator_login");
    Route::post("/login", [ModeratorController::class, "ModeratorLoginStore"])->name("moderator_login_store");
    Route::get("/logout", [ModeratorController::class, "ModeratorLogout"])->name("moderator_logout")->middleware('moderator');
    Route::get("/register", [ModeratorController::class, "ModeratorRegister"])->name("moderator_register");
    Route::post("/register", [ModeratorController::class, "ModeratorRegisterStore"])->name("moderator_register_store");

    // Dashboard
    Route::get("/dashboard", [ModeratorController::class, "ModeratorDashboard"])->name("moderator_dashboard")->middleware('moderator');
});
// End Moderator routes
