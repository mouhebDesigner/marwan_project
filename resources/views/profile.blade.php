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
            </ul>
        </div>
    </nav>
    <section class="packages" id="packages">
        @if(session('updated'))
            <div class="alert alert-success" role="alert">
                {{ session('updated') }}
            </div>
        @endif
        <h1 class="heading"> Modifier <span>Porifle</span> </h1>
        <form  action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('put')
            <table class="table1">
                <tr>
                    <th>Nom </th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Adresse</th>
                </tr>
                <tr>
                    <td>
                        <input type='text' value="{{ Auth::user()->nom }}"  name='nom' placeholder='Entrer Nom'  class="box" />
                        @error('nom')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ Auth::user()->prenom }}"  name='prenom' placeholder='Entrer prénom'  class="box" />
                        @error('prenom')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='date' value="{{ Auth::user()->date_naissance }}"  name='date_naissance' placeholder='Entrer date de naissance'  class="box" />
                        @error('date_naissance')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ Auth::user()->adresse }}"  name='adresse' placeholder='Entrer adresse'  class="box" />
                        @error('adresse')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>

                </tr>
            </table>
            <table class="table2">
                <tr>
                    <th>Adresse Email </th>
                    <th> N° de Telephone</th>
                    @if(Auth::user()->isFormateur() || Auth::user()->isAdmin())

                    <th>Spécialité</th>
                    <th>N° de carte d'identité</th>
                    @else 
                    <th>Formation</th>

                    @endif

                </tr>
                <tr>
                    <td>
                        <input type='text' value="{{ Auth::user()->email }}"  name='email' placeholder="Adresse Email"  class="box" />
                        @error('email')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ Auth::user()->numtel }}"  name='numtel' placeholder="N° de Telephone"  class="box" />
                        @error('numtel')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    @if(Auth::user()->isFormateur() || Auth::user()->isAdmin())
                    <td>
                        <input type='text' value="{{ Auth::user()->specialite }}"  name='specialite' placeholder='specialite'  class="box" />
                        @error('specialite')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    </td>
                    @else 
                    <td>
                        <input type='text' value="{{ Auth::user()->formation }}"  name='formation' placeholder='formation'  class="box" />
                        @error('formation')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    </td>
                    @endif
                    @if(Auth::user()->isFormateur() || Auth::user()->isAdmin())

                    <td>
                        <input type='text' value="{{ Auth::user()->cin }}"  name='cin' placeholder='N° de carte didentité'  class="box" />
                        @error('cin')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    @endif
                </tr>

            </table>
            <table class="table2">
                <tr>
                    <th>Mot de passe </th>
                    <th>Confirmer mot de passe</th>
                </tr>
                <tr>
                    <td>
                        <input type='password' value=""  name='password' placeholder="Mot de passe"  class="box" />
                        @error('password')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td><input type='password' name='password_confirmation' placeholder="Confirmer mot de passe"  class="box" /></td>
                </tr>

            </table>
            <table class="table4">
                <tr>
                    <td align="center" colspan="2"><input type="submit" name="submit1" value="Modifier"
                            class="ajouter_btn" /></td>
                </tr>
            </table>
        </form>
        </div>
</header>
@endsection
