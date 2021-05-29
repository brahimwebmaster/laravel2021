<?php

namespace App\Http\Controllers;
use App\Models\Livre;

use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(){

      $livres = Livre::paginate(8);

     /* $livres = Livre::where('titre', 'Laravel')
      ->where('description','<>', null)
      ->orderBy('id','DESC')
      ->get();   */
      //$livre= Livre::findOrFail(1);
      // $nbLivre = Livre::max('id');
      return view('pages.home',compact('livres'));
    }
    public function ajouterLivre(){

      return view('pages.ajouter_livre');
    }

    public function postAjouterLivre(Request $request){

        $request->validate([
          'titre'=>'required|min:5|alpha_num',
          'description'=>'min:10'
        ]);

        Livre::create($request->all());
         return back()->with('success','Votre Livre a été inseré');
    }
    
    public function afficherLivre($id) {

      $livre= Livre::find($id);
      return view('pages.afficher_livre', compact('livre'));
    }
}
