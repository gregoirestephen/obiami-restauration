<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded=[];

    public function categorie(){
       return $this->belongsTo(Categorie::class);
    }

    public function reservations(){
       return $this->hasMany(Reservation::class);
    }
}
