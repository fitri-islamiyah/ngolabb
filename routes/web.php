<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminModeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Semua route butuh login dan tidak boleh cache (prevent back after logout)
Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profil
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('/profile/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');



    // CRUD Proyek
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::delete('/projects/{project}/remove-member/{user}', [ProjectController::class, 'removeMember'])
    ->name('projects.removeMember');

    // Tambah Anggota Proyek
    Route::post('/projects/{project}/add-member', [ProjectController::class, 'addMember'])
        ->name('projects.addMember');

    // Export PDF
    Route::get('/projects/{project}/export', [DashboardController::class, 'exportPDF'])
        ->name('projects.export');

    // Tugas per proyek
    Route::get('/projects/{project}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');

    // Edit tugas
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
    ->name('tasks.destroy');


    // Projek Saya & Tugas Saya
    Route::get('/my-projects', [ProjectController::class, 'myProjects'])->name('projects.mine');
    Route::get('/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.mine');

    // Cetak PDF
    Route::get('/projects/{project}/pdf', [ProjectController::class, 'exportPdf'])
        ->name('projects.pdf');

    // Search
    Route::get('/search', [DashboardController::class, 'search'])->name('search');
    Route::put('/tasks/{task}/approve', [TaskController::class, 'approve'])
    ->name('tasks.approve');

    Route::get('/notifications', 
        [NotificationController::class, 'index']
    )->name('notifications.all');
    Route::get('/notifications/{notification}/read', 
        [NotificationController::class, 'read']
    )->name('notifications.read');
    Route::get('/toggle-admin-mode', [AdminModeController::class, 'toggle'])
    ->middleware('auth')
    ->name('toggle.admin.mode');


    // =============================
    //      ADMIN ROUTES
    // =============================
    Route::middleware(['admin'])->prefix('admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.dashboard');

        // Manajemen User
        Route::get('/users', [UserManagementController::class, 'index'])
            ->name('admin.users');

        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])
            ->name('admin.users.edit');

        Route::put('/users/{user}', [UserManagementController::class, 'update'])
            ->name('admin.users.update');

        Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])
            ->name('admin.users.destroy');

        // Semua Proyek Admin
        Route::get('/projects', [AdminController::class, 'projects'])
            ->name('admin.projects');

    });

});

require __DIR__.'/auth.php';
