<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransferenciaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GerentesController;
use App\Http\Controllers\SaqueController;
use App\Http\Controllers\ExtratoController;
use App\Http\Controllers\PendenciasController;
use App\Http\Controllers\ContactController;

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
    Route::get('/usuarios/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('users.create');
Route::get('/usuarios/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/usuarios/create', [UserController::class, 'store'])->name('users.store');
Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/usuarios/remover/{user}', [UserController::class, 'destroy'])->name('users.delete');

Route::get('/usuarios/transferencia', [TransferenciaController::class, 'index'])->name('users.transferencia.index');
Route::post('/usuarios/transferencia', [TransferenciaController::class, 'transferir'])->name('users.transferencia.processo');

Route::get('/usuarios/extratos', [ExtratoController::class, 'indexUsuarios'])->name('users.transferencias.extrato');

Route::get('/usuarios/emprestimos', [EmprestimoController::class, 'indexUsuarios'])->name('usuarios.emprestimos.index');
Route::post('/usuarios/emprestimos/solicitar', [EmprestimoController::class, 'solicitarUsuarios'])->name('usuarios.emprestimos.solicitar');
Route::post('/usuarios/emprestimos/pagar/{emprestimo}', [EmprestimoController::class, 'pagar'])->name('usuarios.emprestimos.pagar');

});



Route::middleware('gerente')->group(function(){
    Route::get('/dashboardGerente', function(){
        return view('dashboard');
    })->name('dashboard.gerente');
    Route::get('/gerentes', [GerentesController::class, 'index'])->name('gerentes.index');
    Route::get('/gerentes/usuarios', [GerentesController::class, 'indexUsers'])->name('gerentes.users.index');
    Route::get('/gerentes/edit/users/{user}', [GerentesController::class, 'editUsers'])->name('gerentes.users.edit');
    Route::get('/gerentes/user/create', [GerentesController::class, 'createUsers'])->name('gerentes.users.create');
    Route::get('/gerentes/edit/{gerente}', [GerentesController::class, 'edit'])->name('gerentes.edit');
    Route::post('/gerentes', [GerentesController::class, 'store'])->name('gerentes.store');
    Route::get('/gerentes/usuarios/{user}', [GerentesController::class, 'showUsers'])->name('gerentes.usuarios.show');
    Route::get('/gerentes/{gerente}', [GerentesController::class, 'show'])->name('gerentes.show');
    Route::put('/gerentes/usuarios/{user}', [GerentesController::class, 'updateUsers'])->name('gerentes.usuarios.update');
    Route::put('/gerentes/{gerente}', [GerentesController::class, 'update'])->name('gerentes.update');
    Route::post('/gerentes/delete/{gerente}', [GerentesController::class, 'destroy'])->name('gerentes.delete');
    Route::post('/gerentes/usuarios/delete/{gerente}', [GerentesController::class, 'destroyUsuarios'])->name('gerentes.usuarios.delete');
    
    Route::get('/gerentes/saqueseDepositos', [SaqueController::class, 'index'])->name('gerentes.saques.index');
    Route::get('/gerentes/saques', [SaqueController::class, 'indexSaques'])->name('gerentes.saque.index');
    Route::get('/gerentes/depositos', [SaqueController::class, 'indexDepositos'])->name('gerentes.deposito.index');
    Route::post('/gerentes/depositos', [SaqueController::class, 'storeDepositos'])->name('gerentes.deposito.store');
    Route::post('/gerentes/saques', [SaqueController::class, 'storeSaques'])->name('gerentes.saque.store');
    
    Route::get('/gerentes/transferencia', [TransferenciaController::class, 'index'])->name('gerentes.transferencia.index');
Route::post('/gerentes/transferencia', [TransferenciaController::class, 'transferir'])->name('gerentes.transferencia.processo');

Route::get('/gerentes/extratos', [ExtratoController::class, 'indexGerentes'])->name('gerentes.transferencias.extrato');

Route::get('/gerentes/emprestimos', [EmprestimoController::class, 'indexGerentes'])->name('gerentes.emprestimos.index');
Route::post('/gerentes/emprestimos/solicitar', [EmprestimoController::class, 'solicitarGerentes'])->name('gerentes.emprestimos.solicitar');
Route::post('/gerentes/emprestimos/pagar/{emprestimo}', [EmprestimoController::class, 'pagar'])->name('gerentes.emprestimos.pagar');

Route::get('/gerentes/pendencias', [PendenciasController::class, 'index'])->name('gerentes.pendencias');
});





Route::middleware('admin')->group(function(){
    Route::get('/dashboardAdmin', function(){
        return view('dashboard');
    })->name('dashboard.admin');
    Route::get('/admins/usuarios', [AdminController::class, 'indexUsers'])->name('admins.users.index');
    Route::get('/admins/gerentes', [AdminController::class, 'indexGerentes'])->name('admins.gerentes.index');
    Route::get('/admins/administradores', [AdminController::class, 'indexAdmins'])->name('admins.administradores.index');

    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::get('/admins/gerentes/edit', [AdminController::class, 'createGerentes'])->name('admins.gerentes.create');
    Route::get('/admins/usuarios/create', [AdminController::class, 'createUsuarios'])->name('admins.usuarios.create');

    Route::get('/admins/edit/{admin}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::get('/admins/edit/gerentes/{gerente}', [AdminController::class, 'editGerentes'])->name('admins.gerentes.edit');
    Route::get('/admins/edit/usuarios/{user}', [AdminController::class, 'editUsuarios'])->name('admins.usuarios.edit');

    Route::put('/admins/update/{admin}', [AdminController::class, 'update'])->name('admins.update');
    Route::put('/admins/{gerente}', [AdminController::class, 'updateGerentes'])->name('admins.gerentes.update');
    Route::put('/admins/{user}', [AdminController::class, 'updateUsuarios'])->name('admins.usuarios.update');

    Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('admins.show');
    Route::get('/admins/gerentes/{gerente}', [AdminController::class, 'showGerentes'])->name('admins.gerentes.show');
    Route::get('/admins/usuarios/{user}', [AdminController::class, 'showUsuarios'])->name('admins.usuarios.show');
    
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::post('/admins/gerentes', [AdminController::class, 'storeGerentes'])->name('admins.gerentes.store');
    Route::post('/admins/usuarios', [AdminController::class, 'storeUsuarios'])->name('admins.usuarios.store');

    Route::post('/admins/delete/{admin}', [AdminController::class, 'destroy'])->name('admins.delete');
    Route::post('/admins/gerentes/delete/{gerente}', [AdminController::class, 'destroyGerentes'])->name('admins.gerentes.delete');
    Route::post('/admins/usuarios/delete/{user}', [AdminController::class, 'destroyUsuarios'])->name('admins.usuarios.delete');

    Route::get('/admins/saqueseDepositos', [SaqueController::class, 'index'])->name('admins.saques.index');
    Route::get('/admins/saques', [SaqueController::class, 'indexSaques'])->name('admins.saque.index');
    Route::get('/admins/depositos', [SaqueController::class, 'indexDepositos'])->name('admins.deposito.index');
    Route::post('/admins/saques', [SaqueController::class, 'indexSaques'])->name('admins.saque.store');
    Route::post('/admins/depositos', [SaqueController::class, 'indexDepositos'])->name('usuarios.deposito.store');
    
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});










Route::delete('/admins/remover/{user}', [AdminController::class, 'destroy'])->name('admins.destroy');


require __DIR__.'/auth.php';


