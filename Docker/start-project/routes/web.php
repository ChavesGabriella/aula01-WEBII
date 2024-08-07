<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('report/eixo' , 'App\Http\Controllers\EixoController@report')->name('report');
Route::get('graph/eixo' , 'App\Http\Controllers\EixoController@graph')->name('graph');

Route::resource('/aluno', 'App\Http\Controllers\AlunoController');
Route::resource('/categoria', 'App\Http\Controllers\CategoriaController');
Route::resource('/comprovante', 'App\Http\Controllers\ComprovanteController');
Route::resource('/declaracao', 'App\Http\Controllers\DeclaracaoController');
Route::resource('/curso', 'App\Http\Controllers\CursoController');
Route::resource('/eixo', 'App\Http\Controllers\EixoController');
Route::resource('/permission', 'App\Http\Controllers\PermissionController');
Route::resource('/nivel', 'App\Http\Controllers\NivelController');
Route::resource('/turma', 'App\Http\Controllers\TurmaController');
Route::resource('/usuario', 'App\Http\Controllers\UserController');
