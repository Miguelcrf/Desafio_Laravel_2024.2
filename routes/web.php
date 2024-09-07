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
    Route::post('/gerentes', [GerentesController::class, 'store'])->name('gerentes.store');

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

    Route::get('/admins/edit/{admin}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::get('/admins/edit/gerentes/{gerente}', [AdminController::class, 'editGerentes'])->name('admins.gerentes.edit');
    Route::get('/admins/edit/usuarios/{usuario}', [AdminController::class, 'editUsuarios'])->name('admins.usuarios.edit');

    Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
    Route::put('/admins/{gerente}', [AdminController::class, 'updateGerentes'])->name('admins.gerentes.update');
    Route::put('/admins/{user}', [AdminController::class, 'updateUsuarios'])->name('admins.usuarios.update');

    Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('admins.show');
    Route::get('/admins/gerentes/{gerente}', [AdminController::class, 'showGerentes'])->name('admins.gerentes.show');
    Route::get('/admins/usuarios/{user}', [AdminController::class, 'showUsuarios'])->name('admins.usuarios.show');
    
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::post('/admins/gerentes', [AdminController::class, 'storeGerentes'])->name('admins.gerentes.store');
    Route::post('/admins', [AdminController::class, 'storeUsuarios'])->name('admins.users.store');

    
});


Route::get('/usuarios/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('users.create');
Route::get('/usuarios/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/usuarios/create', [UserController::class, 'store'])->name('users.store');
Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/usuarios/remover/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/transferencia', [TransferenciaController::class, 'index'])->name('transferencia.index');
Route::post('/transferencia', [TransferenciaController::class, 'transferir'])->name('transferencia.processo');



Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');

Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
Route::delete('/admins/remover/{user}', [AdminController::class, 'destroy'])->name('admins.destroy');


require __DIR__.'/auth.php';


