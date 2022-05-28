@extends('layouts.app')

@section('title', 'Dashboard admin')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/allstudentdata.css') }}" type="text/css">
@endsection

@section('content')
<header>
    @include('includes.navbar')

    <div class="main-content-header">
        <h2 class="">
            Liste des formateurs
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
            <form action="{{ url('formateur/search') }}" method="get">
                @csrf
                <input type="text" name="search" class="search_by" placeholder="Chercher un formateur">
                <button type="submit" >
                    <i class="fa fa-search"></i>
                </button>
            </form>
            <a href="{{ route('admin.formateurs.create') }}">
                Ajouter formateur
            </a>
        </div>
        <table border="2">
            <tr>
                <th class="id_h1">Id </th>
                <th class="name_h1">Nom </th>
                <th class="contact_h1">Prénom </th>
                <th class="contact_h1">Date de naissance</th>
                <th class="contact_h1">Adresse Email</th>
                <th class="contact_h1">Adresse</th>
                <th class="contact_h1">Specialité</th>
                <th class="massage_h1">N° de telephone</th>
                <th>Action</th>
            </tr>
            @foreach($formateurs as $formateur)
            <tr>
                <td>{{ $formateur->id }}</td>
                <td>{{ $formateur->nom }}</td>
                <td>{{ $formateur->prenom }}</td>
                <td>{{ $formateur->date_naissance }}</td>
                <td>{{ $formateur->email }}</td>
                <td>{{ $formateur->adresse }}</td>
                <td>{{ $formateur->specialite }}</td>
                <td>{{ $formateur->numtel }}</td>
                <td>
                    <div class="d-flex justify-content-around">
                        <form action="{{ route('admin.formateurs.destroy', ['formateur' => $formateur]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete delete-confirm" style="cursor:pointer" onclick="return confirm('voulez-vous vraiment supprimer ce formateur')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('admin.formateurs.edit', ['formateur'=>$formateur]) }}" style="cursor:pointer" data-model="élève"
                            class="btn-edit edit-confirm">
                            <i class="fa fa-pen"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</header>
@endsection
