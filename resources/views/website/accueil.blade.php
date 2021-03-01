@extends('partial.welcome')


@section('title','Home')

@section('content')
    <section class="gallery-area fix ">

<div class="gallery-top section-bg pt-90 pb-40" data-background="{{asset('frontend')}}/img/gallery/section_bg01.png">
<div class="container">
<div class="row justify-content-center">
<div class="cl-xl-7 col-lg-8 col-md-10">

<div class="section-tittle text-center mb-70">
<span>Bienvenu chez Obiami Restauration,</span>
<h2>Retrouvez le sourire en dégustant nos plats.</h2>
<h3 style="color:#ff5600 !important;">Commander dès maintenant et bénéficier de -20% sur nos plats.</h3>
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="properties__button">

<nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Special</a>
<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Lunch</a>
<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> Brakefirst </a>
<a class="nav-item nav-link" id="nav-dinner-tab" data-toggle="tab" href="#nav-dinner" role="tab" aria-controls="nav-dinner" aria-selected="false"> Dinner </a>
</div>
</nav>

</div>
</div>
</div>
</div>


<div class="container-fluid p-0">

<div class="tab-content" id="nav-tabContent">

<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<div class="row no-gutters">
@forelse ($specials as $special)
    <div class="col-lg-4 col-md-6 col-sm-6">
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
     <p style="text-align: center; color:#ff5600;">Aucun repas renseigne dans cette categorie</p>
@endforelse


</div>
</div>

<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class="row no-gutters">

@forelse ($lunchs as $lunch)
    <div class="col-lg-4 col-md-6 col-sm-6">
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
     <p style="text-align: center; color:#ff5600;">Aucun repas renseigne dans cette categorie</p>
@endforelse

</div>
</div>

<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
<div class="row no-gutters">
@forelse ($breakfasts as $breakfast)
    <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="gallery-box">
    <div class="single-gallery">
    <div class="gallery-img smoll-img" style="background-image: url({{ asset('storage/'.$breakfast->image) }});"></div>
    <div class="g-caption">
    <span>@convert($breakfast->prix)€</span>
    <h4>{{$breakfast->libelle}}</h4>
    <p>{{$breakfast->description}}</p>
    <a href="#" class="btn order-btn">Commander ce plat</a>
    </div>
    </div>
    </div>
    </div>
@empty
     <p style="text-align: center; color:#ff5600;">Aucun repas renseigne dans cette categorie</p>
@endforelse
</div>
</div>

<div class="tab-pane fade" id="nav-dinner" role="tabpanel" aria-labelledby="nav-dinner">
<div class="row no-gutters">

@forelse ($dinners as $dinner)
    <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="gallery-box">
    <div class="single-gallery">
    <div class="gallery-img smoll-img" style="background-image: url({{ asset('storage/'.$dinner->image) }});"></div>
    <div class="g-caption">
    <span>@convert($dinner->prix)€</span>
    <h4>{{$dinner->libelle}}</h4>
    <p>{{$dinner->description}}</p>
    <a href="#" class="btn order-btn">Commander ce plat</a>
    </div>
    </div>
    </div>
    </div>
@empty
     <p style="text-align: center; color:#ff5600;">Aucun repas renseigne dans cette categorie</p>
@endforelse


</div>
</div>
</div>

</div>

</section>


<div class="our-services section-padding30">
<div class="container">
<div class="row justify-content-sm-center">
<div class="cl-xl-7 col-lg-8 col-md-10">

<div class="section-tittle text-center mb-70">
<span>Services Offertes</span>
<h2>Nos Services</h2>
</div>
</div>
</div>
<div class="row">
<div class=" col-lg-6 col-md-8 col-sm-8">
<div class="single-services active text-center mb-30">
<div class="services-ion">
<span> <img src="{{asset('frontend/img/logo/car.png')}}" width="15%" height="15%"  style="filter: invert(34%) sepia(33%) saturate(5416%) hue-rotate(8deg) brightness(109%) contrast(103%);" > </span>
</div>
<div class="services-cap">
<h5><a href="#">Livraison à domicile</a></h5>
<p>Chez Obiami, Nous livrons vos plats chez vous.</p>
</div>
</div>
</div>
<div class=" col-lg-6 col-md-8 col-sm-8">
<div class="single-services active text-center mb-30">
<div class="services-ion">
<span class="flaticon-tools-and-utensils-1" style="color: #ff5600;"></span>
</div>
<div class="services-cap">
<h5><a href="#">Menu personnalisable</a></h5>
<p>Chez Obiami, vous avez la possibilité de composer votre Menu en nous contactant directement.</p>
</div>
</div>
</div>


<div class="  col-lg-12 col-md-14 col-sm-14 pt-3 pb-3"  style=" border-radius: 4px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05); margin: 5% auto 1% auto;">
<div class=" text-center">
<div >
<h2  style="color:#ff5600; "> Desirez-vous composer votre propre Menu?</h2>
<h3>Nous somme joignable au +33 6703 2391 09  </h3>
</div>
</div>
</div>

@endsection
