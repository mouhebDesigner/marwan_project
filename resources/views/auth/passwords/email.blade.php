@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/loginAdmin.css') }}">
@endsection
@section('content')
<div class="center">
    <h1>Récuperer mot de passe</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="post" action="{{ route('password.email') }}">
        @csrf 
        <div class="txt_field">
            <input type="text" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="submit" name="submit" value="Connexion">
    </form>
</div>

@endsection
