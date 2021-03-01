<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProfilController extends Controller
{
    //fonction de validation
    public function validateData(){
        return \request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'description'=>['required','string','max:255'],
        ]);
    }
    //fonction renvoyant la vue
    public function index(){
        if (!Gate::allows('isAdmin')) {
            abort(404, 'you can do this actions');
        }

        $profils=Profil::all();
        return view('profil.index',compact('profils'));

    }

    //fonction d'enregistrement d'un profil
    public function store(){
        $data=$this->validateData();
        Profil::create($data);
        return redirect()->route('profil.index')->with('sucess','Profil Enregistre avec succes');

    }

    //fonction de modification d'un profil
    public function update(Profil $profil){
        $data=$this->validateData();
        $profil->update($data);
        return redirect()->route('profil.index')->with('sucess','Profil Modifie avec succes');

    }

    //fonction de suppression d'un profil
    public function destroy(Profil $profil){
        $profil->delete();
        return redirect()->route('profil.index')->with('sucess','Profil Supprime avec succes');
    }


}
