@extends('layouts.app')

@section('title', 'Liste de cours')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/allstudentdata.css') }}" type="text/css">
@endsection

@section('content')
<header>
    @include('includes.navbar')
    <div class="main-content-header">
        <h2 class="">
            Liste des cours

        </h2>
        <div class="d-flex justify-content-between align-items-center search-add">
            <div>

            </div>
            @if(Auth::user()->isFormateur())
            <a href="{{ route('formateur.cours.create') }}">
                Ajouter cour
            </a>
            @endif
        </div>
        <table border="2">
            <tr>
                <th class="name_h1">Matiere</th>
                <th class="name_h1">Titre</th>
                <th class="name_h1">Fichier</th>
                @if(Auth::user()->isFormateur())
                <th>Action</th>
                @endif
            </tr>
            @foreach($cours as $cour)
            <tr>
                <td>{{ $cour->matiere->label }}</td>
                <td>{{ $cour->titre }}</td>
                <td>
                    <a href="{{ url('download/'.$cour->id) }}">
                        Télécharger cour
                    </a>
                </td>
                @if(Auth::user()->isFormateur())
                <td>
                    <div class="d-flex justify-content-around">
                        <form action="{{ route('formateur.cours.destroy', ['cour' => $cour]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete delete-confirm" style="cursor:pointer" onclick="return confirm('voulez-vous vraiment supprimer ce cour')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                       
                    </div>
                </td>
                @endif
            </tr>
            @endforeach

        </table>
    </div>
</header>
@endsection
