@extends('layouts.app')

@section('title', 'Ajouter note')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/addmark.css') }}" type="text/css">
@endsection
@section('content')
<header>
    <nav>
        <div class="row clearfix">
            <ul class="main-nav" animate slideInDown>
                <li class="logout"><a href="{{ url('home') }}">Accueil</a></li>
                <li><a href="{{ route('formateur.notes.index') }}">notes</a></li>
            </ul>
        </div>
    </nav>
    <section class="packages" id="packages">
        <h1 class="heading"> Ajouter <span>un note</span> </h1>
        <form method="post" action="{{ route('formateur.notes.store') }}" enctype="multipart/form-data">
            @csrf
            <table class="table1">
                <tr>
                    <th>Semester </th>
                    <th>Matière </th>
                    <th>Elève </th>
                    <th>Note </th>
                </tr>
                <tr>
                    <td>
                        <select  class="box" name="semester" id="">
                            <option value="">Sélectionner un semester</option>
                            <option value="Semester 1">Semester 1</option>
                            <option value="Semester 2">Semester 2</option>
                        </select>
                        @error('titre')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <select  class="box" name="matiere_id" id="">
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
                        <select  class="box" name="user_id" id="">
                            <option value="">Sélectionner un élève</option>
                            @foreach($eleves as $eleve)
                                <option value="{{ $eleve->id }}">{{ $eleve->nom }} {{ $eleve->prenom }}</option>
                            @endforeach
                        </select>
                        @error('titre')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ old('valeur') }}"  name='valeur' placeholder='Entrer valeur' required class="box" />
                        @error('valeur')
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
