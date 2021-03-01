<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    //foncton renvoyant la vue du site
    public function index(){
        //nombre de reservation
        $count=0;
        //repas de type special
        $specials = DB::table('articles')
        ->join('categories', 'categories.id', '=', 'articles.categorie_id')
        ->select('articles.*', 'categories.name as myCategorie')
        ->where( 'articles.deleted_at', NULL)
        ->where('categories.name', 'Special')
        ->limit(6)
        ->get();

        //repas de type Breakfast
        $breakfasts = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categorie_id')
            ->select('articles.*', 'categories.name as myCategorie')
            ->where('articles.deleted_at', NULL)
            ->where('categories.name', 'Breakfast')
            ->limit(6)
            ->get();

        //repas de type Lunch
        $lunchs = DB::table('articles')
        ->join('categories', 'categories.id', '=', 'articles.categorie_id')
        ->select('articles.*', 'categories.name as myCategorie')
        ->where('articles.deleted_at', NULL)
        ->where('categories.name', 'Lunch')
        ->limit(6)
        ->get();

        //repas de type Dinner
        $dinners = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categorie_id')
            ->select('articles.*', 'categories.name as myCategorie')
            ->where('articles.deleted_at', NULL)
            ->where('categories.name', 'Dinner')
            ->limit(6)
            ->get();


        return view('website.accueil',compact('dinners','breakfasts','specials','lunchs','count'));
    }

}
