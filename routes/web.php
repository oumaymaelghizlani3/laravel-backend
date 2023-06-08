<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\DemandeController;
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

Route::get('/', function () {
    return view('welcome');
});
//Pour fournisseur
Route::get('fournisseur',[FournisseurController::class,'getData1']);
Route::get('addfournisseur', [FournisseurController::class,'addFournisseur']);
Route::get('/deleteFournisseur/{id}', [FournisseurController::class,'deleteFournisseur']);
Route::get('enregistrement/{id}', [FournisseurController::class,'get']);
Route::get('enregistrements/{id}', [FournisseurController::class, 'update']);
//Pour commande
Route::get('commande',[CommandController::class,'getData3']);
Route::get('addcommande', [CommandController::class,'addCommande']);
Route::get('/deleteCommande/{id}', [CommandController::class,'deleteCommand']);
Route::get('enregistrementCm/{id}', [CommandController::class,'getCm']);
Route::get('enregistrementsCm/{id}', [CommandController::class, 'updateCm']);
//Pour livraison
Route::get('livraison',[LivraisonController::class,'getData4']);
Route::get('addlivraison', [LivraisonController::class,'addLivraison']);
Route::get('/deleteLivraison/{id}', [LivraisonController::class,'deleteLivraison']);
Route::get('enregistrementLiv/{id}', [LivraisonController::class,'getLiv']);
Route::get('enregistrementsLiv/{id}', [LivraisonController::class, 'updateLiv']);
Route::get('enregistrementLivo/{num_commande}', [LivraisonController::class, 'getlivo']);
//Pour Reception 
Route::get('reception',[ReceptionController::class,'getData5']);
Route::get('addreception', [ReceptionController::class,'addReception']);
Route::get('/deleteReception/{id}', [ReceptionController::class,'deleteReception']);
Route::get('enregistrementRec/{id}', [ReceptionController::class,'getRec']);
Route::get('enregistrementsRec/{id}', [ReceptionController::class, 'updateRec']);
Route::get('enregistrementReco/{num_commande}', [ReceptionController::class, 'getReco']);
//Graphe
Route::get('/chart-data', [ChartController::class, 'getOrdersByYear']);
//Demande
Route::get('demande',[DemandeController::class,'getData6']);
Route::get('addDemand', [DemandeController::class,'addDemand']);
Route::get('/deleteDemand/{id}', [DemandeController::class,'deleteDemand']);
Route::get('enregistrementDm/{id}', [DemandeController::class,'getDm']);
Route::get('enregistrementsDm/{id}', [DemandeController::class, 'updateDm']);