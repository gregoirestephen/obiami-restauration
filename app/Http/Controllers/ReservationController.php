<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReservationController extends Controller
{

    //fonction de validation du formulaire de reservation
    public function validateData(){
        return request()->validate([
            'nom'=>['required','string'],
            'prenom' => ['required','string'],
            'contact' => ['required','integer'],
            'date_reservation' => ['required','date'],
            'heure' => ['required','max:2'],
        ]);
    }

    //fonction renvoyant une vue
    public function index(){
        if (!Gate::allows('isGestionnaire')) {
            abort(404, 'you can do this actions');
        }
        $reservations=Reservation::all();
        return view('reservation.index',compact('reservations'));

    }

    //fonction d'enregistrement d'une reservation
    public function store(){
        $data=$this->validateData();
        Reservation::create($data);

    }

    //fonction de modification d'une reservation
    public function update(Reservation $reservation){
        $data=$this->validateData();
        $reservation->update($data);
        return redirect()->route('reservation.index')->with('sucess',"Reservation Modifie avec succes");
    }

    //fonction de suppression d'une reservation
    public function destroy(Reservation $reservation){
        $reservation->delete();
        return redirect()->route('reservation.index')->with('sucess',"Reservation supprime avec succes");
    }
}
