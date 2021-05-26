<?php

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

//Route::get('/', function () {
 //   return view('welcome');
//});



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/crear', [App\Http\Controllers\UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit');
Route::patch('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/usuarios/{usuarios}', [App\Http\Controllers\UserController::class, 'show'])->name('usuarios.show');

Route::post('/rol', [App\Http\Controllers\Rolecontroller::class, 'store'])->name('roles.stores');

Route::get('/roles', [App\Http\Controllers\Rolecontroller::class, 'index'])->name('roles.index');




Route::get('/cedesss', [App\Http\Controllers\cedecontroller::class, 'index'])->name('cedes.index');
Route::get('/cedes/crear', [App\Http\Controllers\cedecontroller::class, 'create'])->name('cedes.create');
Route::POST('/cedes', [App\Http\Controllers\cedecontroller::class, 'store'])->name('cedes.store');
Route::get('/cedes/{id}/edit', [App\Http\Controllers\cedecontroller::class, 'edit'])->name('cedes.edit');
Route::patch('/cedes/{id}', [App\Http\Controllers\cedecontroller::class, 'update'])->name('cedes.update');
Route::delete('/cedes/{id}', [App\Http\Controllers\cedecontroller::class, 'destroy'])->name('cedes.destroy');
Route::get('/cedes/{cedes}', [App\Http\Controllers\cedecontroller::class, 'show'])->name('cedes.show');

Route::get('/dueños', [App\Http\Controllers\DueñoContoller::class, 'index'])->name('dueños.index');
Route::get('/dueños/crear', [App\Http\Controllers\DueñoContoller::class, 'create'])->name('dueños.create');
Route::POST('/dueños', [App\Http\Controllers\DueñoContoller::class, 'store'])->name('dueños.store');
Route::get('/dueños/{id}/edit', [App\Http\Controllers\DueñoContoller::class, 'edit'])->name('dueños.edit');
Route::patch('/dueños/{id}', [App\Http\Controllers\DueñoContoller::class, 'update'])->name('dueños.update');
Route::delete('/dueños/{id}', [App\Http\Controllers\DueñoContoller::class, 'destroy'])->name('dueños.destroy');
Route::get('/dueños/{id}', [App\Http\Controllers\DueñoContoller::class, 'show'])->name('dueños.show');



Route::get('/gandolas', [App\Http\Controllers\GandolaController::class, 'index'])->name('gandolas.index');
Route::get('/gandolas/crear', [App\Http\Controllers\GandolaController::class, 'create'])->name('gandolas.create');
Route::POST('/gandolas', [App\Http\Controllers\GandolaController::class, 'store'])->name('gandolas.store');
Route::get('/gandolas/{id}/edit', [App\Http\Controllers\GandolaController::class, 'edit'])->name('gandolas.edit');
Route::patch('/gandolas/{id}', [App\Http\Controllers\GandolaController::class, 'update'])->name('gandolas.update');
Route::delete('/gandolas/{id}', [App\Http\Controllers\GandolaController::class, 'destroy'])->name('gandolas.destroy');
Route::get('/gandolas/{id}', [App\Http\Controllers\GandolaController::class, 'show'])->name('gandolas.show');



Route::get('/choferes', [App\Http\Controllers\ChofereController::class, 'index'])->name('choferes.index');
Route::get('/choferes/crear', [App\Http\Controllers\ChofereController::class, 'create'])->name('choferes.create');
Route::POST('/choferes', [App\Http\Controllers\ChofereController::class, 'store'])->name('choferes.store');
Route::get('/choferes/{id}/edit', [App\Http\Controllers\ChofereController::class, 'edit'])->name('choferes.edit');
Route::patch('/choferes/{choferes}', [App\Http\Controllers\ChofereController::class, 'update'])->name('choferes.update');
Route::delete('/choferes/{id}', [App\Http\Controllers\ChofereController::class, 'destroy'])->name('choferes.destroy');
Route::get('/choferes/{id}', [App\Http\Controllers\ChofereController::class, 'show'])->name('choferes.show');


//Route::get('/exportfile', [App\Http\Controllers\GuiaController::class, 'exports'])->name('exportaritem');
Route::get('/guias', [App\Http\Controllers\GuiaController::class, 'index'])->name('guias.index');
Route::get('/guias/crear', [App\Http\Controllers\GuiaController::class, 'create'])->name('guias.create');
Route::POST('/guias', [App\Http\Controllers\GuiaController::class, 'store'])->name('guias.store');
Route::get('/guias/{guia}/edit', [App\Http\Controllers\GuiaController::class, 'edit'])->name('guias.edit');
Route::PATCH('/guias/{guia}', [App\Http\Controllers\GuiaController::class, 'update'])->name('guias.update');
Route::delete('/guias/{id}', [App\Http\Controllers\GuiaController::class, 'destroy'])->name('guias.destroy');
Route::get('/guias/{id}', [App\Http\Controllers\GuiaController::class, 'show'])->name('guias.show');


Route::get('/consultas', [App\Http\Controllers\ConsultaController::class, 'index'])->name('consultas.index');
Route::get('/consulta', [App\Http\Controllers\CombinadaController::class, 'index'])->name('consultas.consul');
Route::get('/consultaaa', [App\Http\Controllers\consulta2controller::class, 'index'])->name('consultas.consultaaa');

Route::get('/excel/post-export', [App\Http\Controllers\GuiaController::class, 'export'])->name('post.export');

Route::get('uuuser-list-pdf', [App\Http\Controllers\GuiaController::class, 'exportartriplePdf'])->name('uuuser.pdf');
Route::get('user-list-pdf', [App\Http\Controllers\GuiaController::class, 'exportPdf'])->name('user.pdf');
Route::get('uuser-list-pdf', [App\Http\Controllers\GuiaController::class, 'exportarPdf'])->name('uuser.pdf');




Route::get('/notas/todas', [App\Http\Controllers\NotasController::class, 'todas']);
Route::get('/notas/favoritas', [App\Http\Controllers\NotasController::class, 'favoritas']);
Route::get('/notas/archivadas', [App\Http\Controllers\NotasController::class, 'archivadas']);


Route::get('/exportfile', [App\Http\Controllers\ExportController::class, 'exports'])->name('exportaritem');
Route::get('/exportfileii', [App\Http\Controllers\ExportController::class, 'exportsII'])->name('exportaritemII');

Route::get('/exportfileiii', [App\Http\Controllers\ExportController::class, 'exportsIII'])->name('exportaritemIII');


Route::post('/mostrar', function () {
    return view('motrar');
});
