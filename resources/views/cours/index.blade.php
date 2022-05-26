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
            <a href="{{ route('formateur.cours.create') }}">
                Ajouter cour
            </a>
        </div>
        <table border="2">
            <tr>
                <th class="id_h1">Id </th>
                <th class="name_h1">fichier</th>
                <th>Action</th>
            </tr>
            @foreach($cours as $cour)
            <tr>
                <td>{{ $cour->id }}</td>
                <td>
                    <a href="{{ url('download/'.$cour->id) }}">
                        Télécharger cour
                    </a>
                </td>
                <td>
                    <div class="d-flex justify-content-around">
                        <form action="{{ route('admin.matieres.destroy', ['matiere' => $cour]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete delete-confirm" style="cursor:pointer" onclick="return confirm('voulez-vous vraiment supprimer cette matière')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                       
                    </div>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</header>
@endsection
