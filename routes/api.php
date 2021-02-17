<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AbsenController;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\MkController;
use App\Http\Controllers\Api\KontrakmkController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\SemesterController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('', [MahasiswaController::class, 'index']);
Route::resources([
    'presences' => AbsenController::class,
    'students' => MahasiswaController::class,
    'courses' => MkController::class,
    'contracts' => KontrakmkController::class,
    'schedules' => JadwalController::class,
    'semesters' => SemesterController::class,
]);