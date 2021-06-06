<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use App\Models\Category;


use Illuminate\Http\Request;

class LivreController extends Controller
{

 /* public function __construct()  
    {  
      $this->middleware('auth')->only(['ajouterLivre']);  
    }*/
    public function index(){

      $livres = Livre::paginate(8);

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

    public function chercherParCategorie ($idCat){
      $livres = Livre::where('category_id', $idCat)->orderBy('id','desc')->paginate(8);
      return view('pages.home',compact('livres'));
    }
    public function chercherParTitre(Request $request){
      $livres = Livre::where('titre', 'like','%'.$request->recherche.'%')
      ->orWhere('description','like','%'.$request->recherche.'%')
      ->orderBy('id','desc')->paginate(5);
      ////
      return view('pages.home',compact('livres'));

  }
}
