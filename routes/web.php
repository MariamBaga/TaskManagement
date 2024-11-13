<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TaskController;

use App\Http\Controllers\EmployeController;

use App\Http\Controllers\NotificationController;


use App\Http\Controllers\EmployeProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    //define my config routes
    Route::resource('projects', ProjectsController::class);
    Route::resource('tasks', TaskController::class);

    Route::resource('users', UserController::class);
    Route::get('projects/{id}/users',  [UserController::class, 'findUser'])->name('users.find');
    Route::resource('employee', EmployeController::class);

    Route::resource('employeeProfile', EmployeProfileController::class);

//


    // Routes pour la gestion des tâches (restreintes aux admins)
    Route::resource('tasks', TaskController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->middleware('role:admin');

    // Autres routes, notifications et profil
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

