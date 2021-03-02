<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;


class ArticleController extends Controller
{
    //fonction de validation
    public function validateData(){
        return \request()->validate([
            'categorie_id'=>['required','integer'],
            'libelle'=>['required','string'],
            'description'=>['required','string'],
            'prix'=>['required','integer'],
            'image'=>['sometimes','image'],
        ]);
    }

    //fonction d'upload d'image
    public function image_upload(){
        $temp=request('image')->store('public');
        // $image = Image::make(public_path("storage/" . $temp))->fit(600,600);
        $image= Image::make(public_path("storage/" . $temp));
        $image->resize(600,600);
        $image->save();
        return $temp;
    }

    //fonction retournant une vue
    public function index(){
        if (!Gate::allows('isGestionnaire')) {
            abort(404, 'you can do this actions');
        }
        $articles = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categorie_id')
            ->select('articles.*', 'categories.name as myCategorie')
            ->where('articles.deleted_at',NULL)
            ->get();
        $categories=Categorie::all();
        return view('article.index',compact('articles','categories'));
    }

    //fonction d'enregistrement
    public function store(){
        $data = $this->validateData();
        $faker=Factory::create();
        $data['slug']=$faker->slug(9);
        $imagePath=$this->image_upload();
        $data['image'] = $imagePath;
       Article::create($data);
       return redirect()->route('article.index')->with('sucess','Article Enregistre avec succes');
    }

    //fonction de modification
    public function update(Article $article){
        $data=$this->validateData();
        if (strlen($_FILES['image']['name'])>0){
            $imagePath=$this->image_upload();
            $article->update(array_merge(
                $data,
                ['image'=>$imagePath]
            ));
        }
        else if (strlen($_FILES['image']['name'])<=0){
            $data['image']=$article->image;
            $article->update($data);
        }

        return redirect()->route('article.index')->with('sucess','Article Modifie avec succes');
    }

    //fonction de suppression
    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('article.index')->with('sucess','Article Supprime avec succes');
    }

    //fonction renvoyant la vue sous menu Brakefast
    public function brakefast(){
        //repas de type Breakfast
        $breakfasts = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categorie_id')
            ->select('articles.*', 'categories.name as myCategorie')
            ->where('articles.deleted_at', NULL)
            ->where('categories.name', 'Breakfast')
            ->get();

        return view('website.brakefast',compact('breakfasts'));
    }

    //fonction renvoyant la vue sous menu Dinner
    public function dinner(){
        //repas de type Dinner
        $dinners = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categorie_id')
            ->select('articles.*', 'categories.name as myCategorie')
            ->where('articles.deleted_at', NULL)
            ->where('categories.name', 'Dinner')
            ->get();

        return view('website.dinner',compact('dinners'));
    }

    //fonction renvoyant la vue sous menu Lunch
    public function lunch(){
        //repas de type Lunch
        $lunchs = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categorie_id')
            ->select('articles.*', 'categories.name as myCategorie')
            ->where('articles.deleted_at', NULL)
            ->where('categories.name', 'Lunch')
            ->get();

        return view('website.lunch', compact('lunchs'));
    }

    //fonction renvoyant la vue sous menu special
    public function special(){
        //repas de type special
        $specials = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categorie_id')
            ->select('articles.*', 'categories.name as myCategorie')
            ->where('articles.deleted_at', NULL)
            ->where('categories.name', 'Special')
            ->get();

        return view('website.special', compact('specials'));
    }


}
