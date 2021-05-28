<?php

namespace App\Http\Controllers;
use App\Models\Livre;

use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(){

      return view('pages.home');
    }
    public function ajouterLivre(){

      return view('pages.ajouter_livre');
    }

    public function postAjouterLivre(Request $request){


        Livre::create($request->all());

      /* $livre = new Livre() ;
       $livre->titre = $request->titre;
       $livre->description = $request->description;
       $livre->save();*/
    }
    //
}
