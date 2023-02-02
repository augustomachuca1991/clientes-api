<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



// http://127.0.0.1:8000/api/clients
Route::get('/clients' , [ClientController::class, 'index']);
// http://127.0.0.1:8000/api/clients/create
Route::post('/clients/create', [ClientController::class, 'store']);
// http://127.0.0.1:8000/api/clients/{client_id}
Route::get('/clients/{id}', [ClientController::class, 'show']);
// http://127.0.0.1:8000/api/clients/update/{client_id}
Route::put('/clients/update/{id}', [ClientController::class, 'update']);
// http://127.0.0.1:8000/api/clients/delete/{client_id}
Route::delete('/clients/delete/{id}', [ClientController::class, 'destroy']);
// http://127.0.0.1:8000/api/clients/{value}
Route::get('/clients/search/{value}', [ClientController::class, 'search']);

