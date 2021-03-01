@extends('partial.frontend-menu')


@section('catalogue','Special')


@section('plats')
       @forelse ($specials as $special)
        <div class="col-lg-3 col-md-5 col-sm-5 mr-3 mb-3">
        <div class="gallery-box">
        <div class="single-gallery">
        <div class="gallery-img smoll-img" style="background-image: url({{ asset('storage/'.$special->image) }});"></div>
        <div class="g-caption">
        <span>@convert($special->prix)€</span>
        <h4>{{$special->libelle}}</h4>
        <p>{{$special->description}}</p>
        <a href="#" class="btn order-btn">Commander ce plat</a>
        </div>
        </div>
        </div>
        </div>
        @empty
            <p style="text-align: center; color:#ff5600; margin: auto 30% !important; ">Aucun repas renseigne dans cette categorie</p>
        @endforelse
@endsection

