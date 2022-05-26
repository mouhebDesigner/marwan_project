@extends('layouts.app')

@section('title', 'Ajouter formateur')

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
        <h1 class="heading"> Ajouter <span>un actualités</span> </h1>
        <form method="post" action="{{ route('admin.actualites.store') }}" enctype="multipart/form-data">
            @csrf
            <table class="table1">
                <tr>
                    <th>Titre </th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
                <tr>
                    <td>
                        <input type='text' value="{{ old('titre') }}"  name='titre' placeholder='Entrer titre' required class="box" />
                        @error('titre')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ old('description') }}"  name='description' placeholder='Entrer prénom' required class="box" />
                        @error('description')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='file'  name='image'  required class="box" />
                        @error('image')
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
