@extends('layouts.app')

@section('title', 'Page d\'acceuil')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection
@section('content')
@include('includes.header')
<!-- header section ends -->

<!-- home section starts  -->

<section class="Accueil" id="Accueil">

    <div class="image" data-aos="fade-down">
        <img src="images/eco.png" alt="">
    </div>

    <div class="content" data-aos="fade-up">
        <h3>Découvrir Nos Formations</h3>
        <p>Nos formations professionnelles, diplômantes, continues ou certifiantes sont à la pointe des innovations
            technologiques. Ecole chourouk présente différents diplômes en BTP et BTS homologués par l’état dans
            plusieurs spécialités telles que le Commerce, la comptabilité, l’informatique, le multimédia,
            l’infographie,…</p>
        <a href="#" class="btn">Voir Tous</a>
    </div>

</section>

<!-- home section ends -->
<!-- packages section starts  -->

<section class="packages" id="packages">

    <h1 class="heading"> Nos <span>Formations</span> </h1>

    <div class="box-container">
        @foreach(App\Models\Actualite::all() as $actualite)
        <div class="box" data-aos="fade-up">
            <div class="image">
                <img src="{{ asset($actualite->image) }}" alt="">
            </div>
            <div class="content">
                <h1>{{ $actualite->titre }}</h1>
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn"> Lire plus</a>
                    <div>
                        <form action="{{ route('admin.actualites.destroy', ['actualite' => $actualite]) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete delete-confirm" style="cursor:pointer"
                                onclick="return confirm('voulez-vous vraiment supprimer ce actualite')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('admin.actualites.edit', ['actualite'=>$actualite]) }}" style="cursor:pointer"
                            data-model="élève" class="btn-edit edit-confirm">
                            <i class="fa fa-pen"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</section>

<!-- packages section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading"> Nos <span>Cours Accélérés</span> </h1>

    <div class="box-container">

        <div class="box" data-aos="zoom-in">
            <span>01</span>
            <i class="fas fa-school-circle-check"></i>
            <h3>Avec ou sans Bac</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, rem.</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <span>02</span>
            <i class="fas fa-plane"></i>
            <h3>Devenir Pro</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, rem.</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <span>03</span>
            <i class="fas fa-utensils"></i>
            <h3>Avec ou sans Bac</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, rem.</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <span>04</span>
            <i class="fas fa-globe"></i>
            <h3>Avec ou sans Bac</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, rem.</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <span>05</span>
            <i class="fas fa-hiking"></i>
            <h3>Avec ou sans Bac</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, rem.</p>
        </div>

        <div class="box" data-aos="zoom-in">
            <span>06</span>
            <i class="fas fa-bullhorn"></i>
            <h3>Avec ou sans Bac</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, rem.</p>
        </div>

    </div>

</section>

<!-- services section ends -->

<!-- pricing section starts  -->

<section class="pricing" id="pricing">

    <h1 class="heading"><span>Diplomes</span> </h1>

    <div class="box-container">

        <div class="box" data-aos="zoom-in-up">
            <h3> BTS </h3>
            <div class="price">
                <span class="amount">2 ans</span>
            </div>
            <ul>
                <li>140 Dinar par mois</li>
                <li>Bac +</li>
                <li>safty guide</li>
                <li>insurance</li>
                <li>luxury hotel</li>
            </ul>
            <a href="#" class="btn">S'inscrire</a>
        </div>

        <div class="box" data-aos="zoom-in-up">
            <h3> BTP </h3>
            <div class="price">
                <span class="amount">2 ans</span>
            </div>
            <ul>
                <li>90 Dinar par mois</li>
                <li>Avoir le Bac</li>
                <li>safty guide</li>
                <li>insurance</li>
                <li>luxury hotel</li>
            </ul>
            <a href="#" class="btn">S'inscrire</a>
        </div>

        <div class="box" data-aos="zoom-in-up">
            <h3> CAP </h3>
            <div class="price">
                <span class="amount">2 ans</span>
            </div>
            <ul>
                <li>80 dinars par mois</li>
                <li>food and drinks</li>
                <li>safty guide</li>
                <li>insurance</li>
                <li>luxury hotel</li>
            </ul>
            <a href="#" class="btn">S'inscrire</a>
        </div>

    </div>
    <section class="gallery" id="gallery">
        <div class="heading">
            <span>Gallery</span>
            <h3>our untold stories</h3>
        </div>

        <div class="gallery-container">
            <a href="images/ch1.jpg" class="box">
                <img src="images/ch1.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>
            <a href="images/ch2.jpg" class="box">
                <img src="images/ch2.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>
            <a href="images/ch3.jpg" class="box">
                <img src="images/ch3.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>
            <a href="images/ch4.jpg" class="box">
                <img src="images/ch4.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>
            <a href="images/ch5.jpg" class="box">
                <img src="images/ch5.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>
            <a href="images/ch6.jpg" class="box">
                <img src="images/ch6.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i> </div>
            </a>
        </div>
    </section>

</section>

<!-- pricing section ends -->

<!-- review section starts  -->


<!-- blog section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"><span>Nouveauté </span> </h1>

    <div class="box-container">

        @foreach(App\Models\Actualite::all() as $actualite)
        <div class="box" data-aos="fade-up">
            <div class="image">
                <img src="{{ asset($actualite->image) }}" alt="">
            </div>
            <div class="content">
                <h1>{{ $actualite->titre }}</h1>
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn"> Lire plus</a>
                    <div>
                        <form action="{{ route('admin.actualites.destroy', ['actualite' => $actualite]) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete delete-confirm" style="cursor:pointer"
                                onclick="return confirm('voulez-vous vraiment supprimer ce actualite')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('admin.actualites.edit', ['actualite'=>$actualite]) }}" style="cursor:pointer"
                            data-model="élève" class="btn-edit edit-confirm">
                            <i class="fa fa-pen"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</section>
@include('includes.footer')

@endsection
