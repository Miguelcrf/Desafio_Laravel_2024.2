<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransferenciaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GerentesController;

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
    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
});
Route::middleware('gerente')->group(function(){
    Route::get('/dashboardGerente', function(){
        return view('dashboard');
    })->name('dashboard.gerente');
    Route::get('/gerentes', [GerentesController::class, 'index'])->name('gerentes.index');
    Route::get('/gerentes/usuarios', [GerentesController::class, 'indexUsers'])->name('gerentes.users.index');
    Route::get('/gerentes/user/edit', [GerentesController::class, 'editUsers'])->name('gerentes.users.edit');
    Route::get('/gerentes/user/create', [GerentesController::class, 'createUsers'])->name('gerentes.users.create');
    Route::get('/gerentes/edit', [GerentesController::class, 'edit'])->name('gerentes.edit');

});

Route::middleware('admin')->group(function(){
    Route::get('/dashboardAdmin', function(){
        return view('dashboard');
    })->name('dashboard.admin');
    Route::get('/admins/usuarios', [AdminController::class, 'indexUsers'])->name('admins.users.index');
    Route::get('/admins/gerentes', [AdminController::class, 'indexGerentes'])->name('admins.gerentes.index');
    Route::get('/admins/administradores', [AdminController::class, 'indexAdmins'])->name('admins.administradores.index');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::get('/admins/create/gerentes', [AdminController::class, 'createGerentes'])->name('admins.gerentes.create');
    Route::get('/admins/create/usuarios', [AdminController::class, 'createUsuarios'])->name('admins.usuarios.create');
    Route::get('/admins/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::get('/admins/edit/gerentes', [AdminController::class, 'editGerentes'])->name('admins.gerentes.edit');
    Route::get('/admins/edit/usuarios', [AdminController::class, 'editUsuarios'])->name('admins.usuarios.edit');
    
});


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


