@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/choisir.css') }}">

@endsection
@section('title', 'Choisir connexion')
@section('content')
     <section class="blogs" id="blogs">

    <h1 class="heading">Esapace Privé</h1>

    <div class="box-container">

        <div class="box" data-aos="fade-up">
            <div class="image">
                <img src="{{ asset('assets/images/oo.jpg') }}" alt="">
            </div>
            <div class="content">
                <h3>ESPACE ENSEIGNANT</h3>
                <a href="{{ url('login') }}" class="btn">Connexion</a>
                <div class="Acces">
                    <h4>Accès Enseignant</h4>
                </div>
            </div>
        </div>

        <div class="box" data-aos="fade-up">
            <div class="image">
                <img src="{{ asset('assets/images/ooo.jpg') }}" alt="">
            </div>
            <div class="content">
                <h3>ESPACE PERSONNEL</h3>
                <a href="{{ url('login') }}" class="btn">Connexion</a>
                <div class="Acces">
                    <h4>Accès Personnel</h4>
                </div>
            </div>
        </div>
         <div class="box" data-aos="fade-up">
            <div class="image">
                <img src="{{ asset('assets/images/ELEVE.jpg') }}" alt="">
            </div>
            <div class="content">
                <h3>ESPACE ÉLEVE</h3>
                <a href="{{ url('login') }}" class="btn">Connexion</a>
                <div class="Acces">
                    <h4>Accès Éleve</h4>
@endsection