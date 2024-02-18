<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CrudControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
   
    //Ruta para mostrar los datos de las reservas del usuario autenticado
    Route::get('/mostrar', [CrudControllerApi::class, 'mostrarDatos']);
    //Ruta para guardar una nueva reserva al usuario autenticado
    Route::post('/insertar', [CrudControllerApi::class, 'insertarDatos']);
    //Ruta para borrar una reserva del usuario autenticado
    Route::delete('/borrar', [CrudControllerApi::class, 'borrarDatos']);
});

// Ruta para crear un usuario
Route::post('/register', [AuthController::class, 'createUser']);
Route::get('/mostrarTODAS', [CrudControllerApi::class, 'mostrarTODOSDatos']);
// Ruta para iniciar sesión
Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/insertarNoReg', [CrudControllerApi::class, 'insertarDatosNoregistrado']);