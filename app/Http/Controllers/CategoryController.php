<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function ajouterCategorie(){

        $categories = Category::withCount('livres')->orderBy('livres_count','DESC')->get();
        return view('pages.ajouter_categorie',compact('categories'));
    }

    public function postAjouterCategorie(Request $request) {

        $request->validate(
            [
            'nom_categorie'=>'required|min:3|unique:categories'
            ]
           );
           Category::create($request->all());
            return redirect()->back()->with('success','Votre Catégorie a été ajouté');
       }
}
