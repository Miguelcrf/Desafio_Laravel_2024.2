<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransferenciaController;
use App\Http\Controllers\AdminController;
Route::get('/login', function () {
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
Route::middleware('gerente')->group(function(){
    Route::get('/dashboardGerente', function(){
        echo "dashboard do gerente";
    })->name('dashboard.gerente');

});

Route::middleware('admin')->group(function(){
    Route::get('/dashboardAdmin', function(){
        echo"dashboard do administrador";
    })->name('dashboard.admin');
    Route::get('/admins/usuarios', [AdminController::class, 'indexUsers'])->name('admins.users.index');
    Route::get('/admins/gerentes', [AdminController::class, 'indexGerentes'])->name('admins.gerentes.index');
});

Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
Route::get('/usuarios/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('users.create');
Route::get('/usuarios/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/usuarios', [UserController::class, 'store'])->name('users.store');
Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/usuarios/remover/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/transferencia', [TransferenciaController::class, 'index'])->name('transferencia.index');
Route::post('/transferencia', [TransferenciaController::class, 'transferir'])->name('transferencia.processo');


Route::get('/admins/edit', [AdminController::class, 'edit'])->name('admins.edit');
Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
Route::get('/admins/{user}', [AdminController::class, 'show'])->name('admins.show');
Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
Route::put('/admins/{user}', [AdminController::class, 'update'])->name('admins.update');
Route::delete('/admins/remover/{user}', [AdminController::class, 'destroy'])->name('admins.destroy');
require __DIR__.'/auth.php';


