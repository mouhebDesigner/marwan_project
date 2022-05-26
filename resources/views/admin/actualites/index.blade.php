@extends('layouts.app')

@section('title', 'Dashboard admin')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/allstudentdata.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
<header>
    @include('includes.navbar')

    <div class="main-content-header">
        <h2 class="">
            Liste des actualites
        </h2>
        <div class="d-flex justify-content-between align-items-center search-add">
            <div>
                
            </div>
            <a href="{{ route('admin.actualites.create') }}">
                Ajouter actualite
            </a>
        </div>
    <section class="packages" id="packages">

        <div class="box-container">
            @foreach($actualites as $actualite)
                <div class="box" data-aos="fade-up">
                    <div class="image">
                        <img src="{{ asset($actualite->image) }}" alt="">
                    </div>
                    <div class="content">
                        <h1>{{ $actualite->titre }}</h1>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn"> Lire plus</a>
                            <div>
                                <form action="{{ route('admin.actualites.destroy', ['actualite' => $actualite]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-delete delete-confirm" style="cursor:pointer" onclick="return confirm('voulez-vous vraiment supprimer ce actualite')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('admin.actualites.edit', ['actualite'=>$actualite]) }}" style="cursor:pointer" data-model="élève"
                                    class="btn-edit edit-confirm">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</header>
@endsection
