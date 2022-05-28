@extends('layouts.app')

@section('title', 'Page d\'acceuil')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    @include('includes.header')
 
    <section class="packages fc" id="packages">
        
    <h1 class="heading"> Contactez-<span>nous</span> </h1>

    <div class="box-container">
             <form action="{{ url('contacts') }}" method="post" class="form_contact">
            @csrf 
            @guest 

            
                <input type="text" name="email" placeholder="Email">
            @else 
                <input type="hidden" name="email" placeholder="Email" value="{{ Auth::user()->email }}">

            @endif
            <input type="text" name="sujet" placeholder="Sujet">
            <textarea name="message" id="" cols="30" rows="10" placeholder="Description"></textarea>
            <input type="submit" value="Envoyer">
        </form>

    </div>

</section>
@endsection
