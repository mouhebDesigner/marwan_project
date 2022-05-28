@extends('layouts.app')

@section('title', 'Liste de messages')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/allstudentdata.css') }}" type="text/css">
@endsection

@section('content')
<header>
    @include('includes.navbar')
    <div class="main-content-header">
        @if(session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif
        <h2 class="">
            Liste des messages

        </h2>
        <table border="2">
            <tr>
                <th class="name_h1">Email</th>
                <th class="name_h1">Sujet</th>
                <th>Action</th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->sujet }}</td>
                <td>
                    <div class="d-flex justify-content-around">
                        <form action="{{ route('admin.contacts.destroy', ['contact' => $contact]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete delete-confirm" style="cursor:pointer" onclick="return confirm('voulez-vous vraiment supprimer ce message')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('admin.contacts.show', ['contact' => $contact]) }}">Voir message</a>
                       
                    </div>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</header>
@endsection
