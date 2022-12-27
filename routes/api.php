<?php

use App\Http\Controllers\Api\ActorController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SignUpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Movie;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/sign-up', [SignUpController::class, 'signUp']);

Route::post('/sign-in', [AuthController::class, 'signIn']);

Route::get('/movies', [MovieController::class, 'list']);

Route::get('/movies/{movie}', [MovieController::class, 'show']);

Route::group(['prefix' => '/movies', 'middleware' => ['auth:api']], function () {

    Route::post('/create', [MovieController::class, 'create'])->middleware('can:create,' . Movie::class);

    Route::put('/{movie}/edit', [MovieController::class, 'edit'])->middleware('can:edit,movie');

    Route::delete('/{movie}/delete', [MovieController::class, 'delete'])->middleware('can:delete,movie');
});

Route::get('/genres', [GenreController::class, 'list']);

Route::get('/actors', [ActorController::class, 'list']);
