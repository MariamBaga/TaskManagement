<?php

use App\Http\Controllers\{
    ProfileController,
    ProjectsController,
    TaskController,
    EmployeController,
    NotificationController,
    EmployeProfileController,
    HomeController,
    UserController
};
use Illuminate\Support\Facades\Route;

// Route d'accueil vers la page de connexion
Route::get('/', function () {
    return view('auth.login');
});

// Routes nécessitant une authentification
Route::middleware('auth')->group(function () {

    // Tableau de bord
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Routes pour les projets avec restrictions d'accès pour les actions d'administration
    Route::resource('projects', ProjectsController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('projects', ProjectsController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->middleware('role:admin');

    // Routes pour les tâches avec restrictions d'accès pour les actions d'administration
    Route::resource('tasks', TaskController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('tasks', TaskController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->middleware('role:admin');

    // Mise à jour du statut d'une tâche
Route::patch('tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('update-status');


    // Gestion des utilisateurs
    Route::resource('users', UserController::class);
    Route::get('projects/{id}/users', [UserController::class, 'findUser'])->name('users.find');

    // Gestion des employés et de leurs profils
    Route::resource('employee', EmployeController::class);
    Route::resource('employeeProfile', EmployeProfileController::class);

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    // Profil utilisateur
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
