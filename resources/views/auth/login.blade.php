@extends('layouts.app')

@section('title', 'page de connexion')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/loginAdmin.css') }}">
@endsection
@section('content')
<div class="center">
    <h1>Connexion</h1>
    <form method="post" action="{{ route('login') }}">
        @csrf 
        <div class="txt_field">
            <input type="text" name="email" required>
            <span></span>
            <label>Email/Numéro de téléphone</label>
        </div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Mot de Passe</label>
        </div>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <input type="submit" name="submit" value="Connexion">
        
    </form>
</div>

@endsection
