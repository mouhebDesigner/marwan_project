@extends('layouts.app')

@section('title', 'Ajouter élève')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/addmark.css') }}" type="text/css">
@endsection
@section('content')
<header>
    <nav>
        <div class="row clearfix">
            <ul class="main-nav" animate slideInDown>
                <li class="logout"><a href="{{ url('home') }}">Accueil</a></li>
                <li><a href="{{ route('admin.students.index') }}">Elèves</a></li>
            </ul>
        </div>
    </nav>
    <section class="packages" id="packages">
        <h1 class="heading"> Ajouter <span>un élève</span> </h1>
        <form method="post" action="{{ route('admin.students.store') }}">
            @csrf
            <input type="hidden" name="role" value="eleve">
            <table class="table1">
                <tr>
                    <th>Nom </th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Adresse</th>
                </tr>
                <tr>
                    <td>
                        <input type='text' value="{{ old('nom') }}"  name='nom' placeholder='Entrer Nom' required class="box" />
                        @error('nom')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ old('prenom') }}"  name='prenom' placeholder='Entrer prénom' required class="box" />
                        @error('prenom')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='date' value="{{ old('date_naissance') }}"  name='date_naissance' placeholder='Entrer date de naissance' required class="box" />
                        @error('date_naissance')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ old('adresse') }}"  name='adresse' placeholder='Entrer adresse' required class="box" />
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
                    <th>Formation</th>
                    <th>N° de carte didentité</th>
                </tr>
                <tr>
                    <td>
                        <input type='text' value="{{ old('email') }}"  name='email' placeholder="Adresse Email" required class="box" />
                        @error('email')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ old('numtel') }}"  name='numtel' placeholder="N° de Telephone" required class="box" />
                        @error('numtel')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ old('formation') }}"  name='formation' placeholder='Formation' required class="box" />
                        @error('formation')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td>
                        <input type='text' value="{{ old('cin') }}"  name='cin' placeholder='N° de carte didentité' required class="box" />
                        @error('cin')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                </tr>

            </table>
            <table class="table2">
                <tr>
                    <th>Mot de passe </th>
                    <th>Confirmer mot de passe</th>
                </tr>
                <tr>
                    <td>
                        <input type='password' value="{{ old('password') }}"  name='password' placeholder="Mot de passe" required class="box" />
                        @error('password')
                            <p class="error-feedback">{{ $message }}</p>
                        @enderror
                    
                    </td>
                    <td><input type='password' name='password_confirmation' placeholder="Confirmer mot de passe" required class="box" /></td>
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
