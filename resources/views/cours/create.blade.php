@extends('layouts.app')

@section('title', 'Ajouter cour')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/addmark.css') }}" type="text/css">
@endsection
@section('content')
<header>
    <nav>
        <div class="row clearfix">
            <ul class="main-nav" animate slideInDown>
                <li class="logout"><a href="{{ url('home') }}">Accueil</a></li>
                <li><a href="{{ route('admin.actualites.index') }}">Actualités</a></li>
            </ul>
        </div>
    </nav>
    <section class="packages" id="packages">
        <h1 class="heading"> Ajouter <span>un cour</span> </h1>
        <form method="post" action="{{ route('formateur.cours.store') }}" enctype="multipart/form-data">
            @csrf
            <table class="table1">
                <tr>
                    <th>Matière </th>
                    <th>Titre </th>
                    <th>Fichier </th>
                </tr>
                <tr>
                    <td>
                        <select name="matiere_id" id="">
                            <option value="">Sélectionner un matiére</option>
                            @foreach($matieres as $matiere)
                                <option value="{{ $matiere->id }}">{{ $matiere->label }}</option>
                            @endforeach
                        </select>
                        @error('titre')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ old('titre') }}"  name='titre' placeholder='Entrer titre' required class="box" />
                        @error('titre')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='file'  name='fichier'  required class="box" />
                        @error('fichier')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                </tr>
            </table>           
            <table class="table4">
                <tr>
                    <td align="center" colspan="2"><input type="submit" name="submit1" value="Ajouter"
                            class="ajouter_btn" /></td>
                </tr>
            </table>
        </form>
        </div>
</header>
@endsection
