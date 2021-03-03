@extends('partial.frontend-menu')


@section('catalogue','Lunch')


@section('plats')
       @forelse ($lunchs as $lunch)
        <div class="col-lg-3 col-md-5 col-sm-5 mr-3 mb-3">
        <div class="gallery-box">
        <div class="single-gallery">
        <div class="gallery-img smoll-img" style="background-image: url({{ asset('storage/'.$lunch->image) }});"></div>
        <div class="g-caption">
        <span>@convert($lunch->prix)€</span>
        <h4>{{$lunch->libelle}}</h4>
        <p>{{$lunch->description}}</p>
        <a href="#" class="btn order-btn">Commander ce plat</a>
        </div>
        </div>
        </div>
        </div>
        @empty
        <div  style="margin: auto 45% !important;">
            <p style= "text-align: center; color:#ff5600; ">Aucun repas renseigne dans cette categorie AAAA</p>
        </div>

        @endforelse
@endsection

