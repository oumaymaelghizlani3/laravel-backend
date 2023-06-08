<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FournisseurController;

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

/*Route::post('addfournisseur',[FournisseurController::class,'addData1'])->middleware('cors');

/*Route::middleware('cors')->post('/addfournisseur', function (Request $request) {
    return $request->user();
});*/
Route::get('addfournisseur', [FournisseurController::class,'addFournisseur']);
Route::get('deleteFournisseur/{id}', [FournisseurController::class,'deleteFournisseur']);


