<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MkController;
use App\Http\Controllers\KontrakmkController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SemesterController;

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

Route::get('', [AbsenController::class, 'index']);
Route::get('', [MahasiswaController::class, 'index']);
Route::get('', [MkController::class, 'index']);
Route::get('', [KontrakmkController::class, 'index']);
Route::get('', [JadwalController::class, 'index']);
Route::get('', [SemesterController::class, 'index']);
// Route::get('/presences', [AbsenController::class, 'index']);
// Route::get('/presences/create', [AbsenController::class, 'create']);
// Route::post('/presences', [AbsenController::class, 'store']);
// Route::get('/presences/{id}', [AbsenController::class, 'show']);
// Route::get('/presences/{id}/edit', [AbsenController::class, 'edit']);
// Route::get('/presences/{id}', [AbsenController::class, 'update']);
// Route::delete('/presences/{id}', [AbsenController::class, 'destroy']);

Route::resources([
    'presences' => AbsenController::class,
    'students' => MahasiswaController::class,
    'courses' => MkController::class,
    'contracts' => KontrakmkController::class,
    'schedules' => JadwalController::class,
    'semesters' => SemesterController::class,
]);