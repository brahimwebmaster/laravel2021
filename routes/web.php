<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.home');
})->name('acceuil');


Route::get('/ajouter_livre', function (){
    return view('pages.ajouter_livre');
})->name('ajouter_livre');

Route::post('/ajouter_livre',function (){

    ddd(request()->all());
   
})->name('post_ajouter_livre');

