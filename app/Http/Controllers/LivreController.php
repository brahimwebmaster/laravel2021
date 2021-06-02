<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use App\Models\Category;


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
      $categories = Category::all();
      return view('pages.ajouter_livre',compact('categories'));
    }

    public function postAjouterLivre(Request $request){

        $request->validate([
          'titre'=>'required|min:5',
          'description'=>'min:10',
          'category_id'=>'required'
        ]);

        Livre::create($request->all());
         return back()->with('success','Votre Livre a été inseré');
    }

    public function editerLivre ($id) {

      $livre = Livre::find($id);
      $categories = Category::all();
      return view('pages.editer_livre',compact('livre','categories'));
    }

    public function postEditerLivre(Request $request, $id){
       $request->validate([
        'titre'=>'required|min:5',
        'description'=>'min:10',
        'category_id'=>'required'
      ]);

      $livre= Livre::find($id)->update($request->all());
      return back()->with('success','Livre edité avec succès');
    }
    
    public function afficherLivre($id) {

      $livre= Livre::find($id);
      return view('pages.afficher_livre', compact('livre'));
    }

    public function supprimerLivre(Livre $livre) {

      $livre->delete();
     return back()->with('success','Livre Supprimé');
    }
}
