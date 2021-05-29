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

        $request->validate([
          'titre'=>'required|min:5',
          'description'=>'min:10'
        ]);

        Livre::create($request->all());
         return back()->with('success','Votre Livre a été inseré');
    }
    //
}
