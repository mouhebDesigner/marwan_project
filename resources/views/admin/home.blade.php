@extends('layouts.app')

@section('title', 'Dashboard admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/admindash.css') }}" type="text/css">
@endsection

@section('content')
<header>
      <nav>
        <div class="row clearfix d-flex justify-content-between" style="margin: 0px; width: 100%">
            <a href="{{ url('profile') }}" class="profile_name">
                {{ Auth::user()->nom }}
                {{ Auth::user()->prenom }}
            </a>
            <ul class="main-nav" style="margin:  0px" animate slideInDown>
                @guest
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                @else 
                    <li><a href="{{ url('home') }}">Accueil</a></li>
                @endif
                
                <li class="logout">
                    <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Déconnecter') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                
          </ul>
        </div>
      </nav>
      <div class="main-content-header">
        @if(Auth::user()->isAdmin())
            <h1>Admin </h1>
            <h3><a href="{{ route('admin.students.create') }}">Ajouter un nouvel éleve</a></h3>
            <h3><a href="{{ route('admin.students.index') }}">Liste des éleves</a></h3>
            <h3><a href="{{ route('admin.formateurs.create') }}">Ajouter un nouvel formateur</a></h3>
            <h3><a href="{{ route('admin.formateurs.index') }}">Liste de formateurs</a></h3>
            <h3><a href="{{ route('admin.actualites.create') }}">Ajouter un nouvel actualtie</a></h3>
            <h3><a href="{{ route('admin.actualites.index') }}">Liste des actualties</a></h3>
            <h3><a href="{{ route('admin.matieres.create') }}">Ajouter un nouvel matiéres</a></h3>
            <h3><a href="{{ route('admin.matieres.index') }}">Liste des matiéres</a></h3>
            <h3><a href="{{ route('admin.contacts.index') }}"> Messages de contact</a></h3>
        @elseif(Auth::user()->isFormateur())
            <h1>Formateur </h1>
            <h3><a href="{{ route('formateur.cours.index') }}">Gérer des cours</a></h3>
            <h3><a href="{{ route('formateur.notes.index') }}">Gérer des notes</a></h3>
            <h3><a href="{{ route('formateur.students.index') }}">Liste des élèves</a></h3>
            <h3><a href="{{ route('contacts.index') }}">Contactez adminitstrateur</a></h3>
        @else 
            <h1>Elève </h1>
            <h3><a href="{{ route('cours.index') }}">Lister les cours</a></h3>
            <h3><a href="{{ route('notes.index') }}">Lister les notes</a></h3>
            <h3><a href="{{ route('matieres.index') }}">Listes les matiéres</a></h3>
        @endif
      </div>
    </header>
@endsection