<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    //
    use PasswordValidationRules;

    public function validateData(){
        return \request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'firstname'=>['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'adresse'=>['sometimes'],
            'tel'=>['sometimes'],
            'profil_id'=>['required','integer'],
            'password' => $this->passwordRules(),
        ]);
    }

    public function index(){
        if (!Gate::allows('isAdmin')) {
            abort(404, 'you can do this actions');
        }

        $profil=Profil::all();
        $users=User::all();
        return view('user.index',compact('users','profil'));
    }

    public function store(){
        $data=$this->validateData();
        $data['password']=Hash::make(\request('password'));
        User::create($data);
        return redirect()->route('user.index')->with('sucess','Utilisateur Enregistre avec succes');
    }

    public function update(User $user){
        $data=$this->validateData();
        if (\request('email')==$user->email){
            return back()->with('error',"une erreur s'est produite lors de la modification");
        }
        else{
            $data['password']=Hash::make(\request('password'));
            $user->update($data);
            return redirect()->route('user.index')->with('sucess','Utilisateur Modifie avec succes');
        }
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.index')->with('sucess','Utilisateur Supprime avec succes');
    }
}
