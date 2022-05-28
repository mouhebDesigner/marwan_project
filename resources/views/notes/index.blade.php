@extends('layouts.app')

@section('title', 'Liste de notes')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/allstudentdata.css') }}" type="text/css">
<style>
    div.cadre{
        resize: both;
        overflow: auto;
        width: 100px;
        height: 100px;
        border: 3px solid black;
    }
</style>
@endsection

@section('content')
<header>
    @include('includes.navbar')
    <div class="main-content-header">
        <h2 class="">
            Liste des notes

        </h2>
         @if(session('created'))
            <div class="alert alert-success" role="alert">
                {{ session('created') }}
            </div>
        @endif
        @if(session('updated'))
            <div class="alert alert-success" role="alert">
                {{ session('updated') }}
            </div>
        @endif
        @if(session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center search-add">
            <div>

            </div>
            @if(Auth::user()->isFormateur())
            <a href="{{ route('formateur.notes.create') }}">
                Ajouter note
            </a>
            @endif
        </div>
        <table border="2">
            <tr>
                <th class="name_h1">Semester</th>
                <th class="name_h1">Matiere</th>
                @if(Auth::user()->isFormateur())
                    <th class="name_h1">Elève</th>
                @endif
                <th class="name_h1">Note</th>
                @if(Auth::user()->isFormateur())
                    <th>Action</th>
                @endif
            </tr>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->semester }}</td>
                <td>{{ $note->matiere->label }}</td>
                @if(Auth::user()->isFormateur())

                <td>{{ $note->user->nom }}</td>
                @endif
                <td>{{ $note->valeur }}</td>
                @if(Auth::user()->isFormateur())
                <td>
                    <div class="d-flex justify-content-around">
                        <form action="{{ route('formateur.notes.destroy', ['note' => $note]) }}" method="post">
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
