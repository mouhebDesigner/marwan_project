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
            Liste des matières

        </h2>
        <div class="d-flex justify-content-between align-items-center search-add">
            <div>

            </div>
            @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.matieres.create') }}">
                Ajouter matiére
            </a>
            @endif
        </div>
        <table border="2">
            <tr>
                @if(Auth::user()->isAdmin())
                <th class="id_h1">Id </th>
                @endif
                <th class="name_h1">libéllé </th>
                <th>Action</th>
            </tr>
            @foreach($matieres as $matiere)
            <tr>
                @if(Auth::user()->isAdmin())
                <td>{{ $matiere->id }}</td>
                @endif
                <td>{{ $matiere->label }}</td>
                @if(Auth::user()->isAdmin())
                <td>
                    <div class="d-flex justify-content-around">
                        <form action="{{ route('admin.matieres.destroy', ['matiere' => $matiere]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete delete-confirm" style="cursor:pointer" onclick="return confirm('voulez-vous vraiment supprimer cette matière')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ url('matiere/'.$matiere->id.'/cours') }}">Cours</a>
                    </div>
                </td>
                @else 
                <td>
                    <div class="d-flex justify-content-around">
                        <a href="{{ url('matiere/'.$matiere->id.'/cours') }}">Cours</a>
                    </div>
                </td>
                
                @endif
            </tr>
            @endforeach

        </table>
    </div>
</header>
@endsection
