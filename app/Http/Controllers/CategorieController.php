<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategorieController extends Controller
{
    //fonction de validation de formulaire categorie
    public function validateData(){
        return request()->validate([
            'name'=>['required','string'],
        ]);
    }
    //fonction renvoyant la vue categorie
    public function index(){
        if (!Gate::allows('isGestionnaire')) {
            abort(404, 'you can do this actions');
        }
        $categories=Categorie::all();
        return view('categorie.index',compact('categories'));

    }

    //fonction d'entegistrement d'une categorie
    public function store(){
        $data=$this->validateData();
        Categorie::create($data);
        return redirect()->route('categorie.index')->with('sucess',"Categorie Enregistre avec succes");
    }

    //fonction de modification d'une categorie
    public function update(Categorie $categorie){
        $data=$this->validateData();
        $categorie->update($data);
        return redirect()->route('categorie.index')->with('sucess', "Categorie Modifie avec succes");

    }

    //fonction de suppression d'une categorie
    public function destroy(Categorie $categorie){
        $categorie->delete();
        return redirect()->route('categorie.index')->with('sucess', "Categorie Supprime avec succes");

    }
}
