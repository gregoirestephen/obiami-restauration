@extends('partial.welcome')


@section('title','Menu')

@section('content')
<section class="gallery-area fix ">

<div class="gallery-top section-bg pt-90 pb-40" data-background="{{asset('frontend')}}/img/gallery/section_bg01.png">
<div class="container">
<div class="row justify-content-center">
<div class="cl-xl-7 col-lg-8 col-md-10">

<div class="section-tittle text-center mb-70">
{{-- <span>Bienvenu chez Obiami Restauration,</span> --}}
<h2>Bienvenu dans notre catalogue de plats.</h2>
<h3 style="color:#ff5600 !important;">Vous decouvrirez dans la suite de cette page, les plats du catalogue @yield('catalogue').</h3>
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="properties__button">

{{-- <nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Special</a>
<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Lunch</a>
<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> Brakefirst </a>
<a class="nav-item nav-link" id="nav-dinner-tab" data-toggle="tab" href="#nav-dinner" role="tab" aria-controls="nav-dinner" aria-selected="false"> Dinner </a>
</div>
</nav> --}}

</div>
</div>
</div>
</div>


<div class="container-fluid p-0 mb-60" style="margin: auto 10% 5% 10%;">

<div class="row no-gutters">
    @yield('plats')
</div>


</div>


</section>




@endsection
