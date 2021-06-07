<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Mail\Contact;



Route::get('/', [LivreController::class,'index'] )->name('acceuil');


// register and auth

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/register',[AuthController::class,'subscribe'])->name('subscribe');
Route::post('/login', [AuthController::class,'postLogin'])->name('postLogin');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

////////////////
 Route::middleware(['auth'])->group(function (){

            // gestion livre
    Route::get('/ajouter_livre', [LivreController::class,'ajouterLivre'])->name('ajouter_livre');
    Route::post('/ajouter_livre',[LivreController::class,'postAjouterLivre'])->name('post_ajouter_livre');

    Route::get('/editer_livre/{id}',[LivreController::class, 'editerLivre'])->name('editer_livre');
    Route::post('/editer_livre/{id}',[LivreController::class,'postEditerLivre'])->name('post_editer_livre');
    
    Route::get('/supprimer_livre/{livre}', [LivreController::class, 'supprimerLivre'])->name('supprimer_livre');
    
    // gestion Catégorie
    Route::get('/ajouter_categorie', [CategoryController::class , 'ajouterCategorie'])->name('ajouter_categorie');
    Route::post('/ajouter_categorie',[CategoryController::class, 'postAjouterCategorie'])->name('post_ajouter_categorie');

});


//
// recherche par catégorie
Route::get('/chercher_par_categorie/{id}', [LivreController::class, 'chercherParCategorie'])->name('recherche_par_categorie');
Route::post('/chercher_par_titre', [LivreController::class, 'chercherParTitre'])->name('recherche_par_titre');
Route::get('/afficher_livre/{id}', [LivreController::class, 'afficherLivre'])->name('afficher_livre');

