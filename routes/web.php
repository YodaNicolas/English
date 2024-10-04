<?php

use App\Http\Controllers\EditController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PrincipalController;
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

// Route::get('/', [PrincipalController::class, 'home'])->name('home');

Route::post('/ajoutCampagne', [PrincipalController::class, 'ajoutCampagne'])->name('ajoutCampagne');
Route::post('/editCampagne/{Camp_id}', [EditController::class, 'editCampagne'])->name('editCampagne');
Route::get('/', [PrincipalController::class, 'campListe'])->name('campListe');

Route::get('/inspecthome/{Camp_id}', [PrincipalController::class, 'inspecthome'])->name('inspecthome');
Route::get('/ImportationEnseignant/{val}', [ImportController::class, 'ImportationForm'])->name('ChoixImportation');
Route::post('/Importations', [ImportController::class, 'ImportationDonnees'])->name('ImportationDonnees');

Route::post('/RapportRed', [PrincipalController::class, 'RapportRed'])->name('RapportRed');

Route::get('/ouvertureCampagne/{id}', [PrincipalController::class, 'ouvertureCampagne'])->name('ouvertureCampagne');

Route::get('/ouvertureRapport/{id}', [PrincipalController::class, 'ouvertureRapport'])->name('ouvertureRapport');

Route::get('/RapportListe', [PrincipalController::class, 'RapportListe'])->name('RapportListe');

Route::get('/campRapportListe/{id}', [PrincipalController::class, 'campRapportListe'])->name('campRapportListe');

Route::get('/Bilan/{Camp_id}', [PrincipalController::class, 'Bilan'])->name('Bilan');

Route::post('/EditRapport/{val}', [EditController::class, 'EditRapport'])->name('EditRapport');
Route::post('/EditEns/{Ens_id}', [EditController::class, 'EditEns'])->name('EditEns');


