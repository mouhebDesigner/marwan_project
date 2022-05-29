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
            Liste des élèves

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
            <form action="{{ url('eleve/search') }}" method="get">
                @csrf
                <input type="text" name="search" class="search_by" placeholder="Chercher un élève">
                <button type="submit" >
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <table border="2">
            <tr>
                <th class="id_h1">Id </th>
                <th class="name_h1">Nom </th>
                <th class="contact_h1">Prénom </th>
                <th class="contact_h1">Date de naissance</th>
                <th class="contact_h1">Adresse Email</th>
                <th class="contact_h1">Adresse</th>
                <th class="massage_h1">N° de telephone</th>
                <th class="contact_h1">Formation</th>
          
            </tr>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->nom }}</td>
                <td>{{ $student->prenom }}</td>
                <td>{{ $student->date_naissance }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->adresse }}</td>
                <td>{{ $student->numtel }}</td>
                <td>{{ $student->formation }}</td>
                
            </tr>
            @endforeach

        </table>
    </div>
</header>
@endsection
