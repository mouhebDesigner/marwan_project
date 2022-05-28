@extends('layouts.app')

@section('title', 'Détail de messages')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/allstudentdata.css') }}" type="text/css">
@endsection

@section('content')
<header>
    @include('includes.navbar')
    <div class="main-content-header">
        <h2 class="">
            Détail de message

        </h2>
        <table border="2">
            <tr>
                <th class="name_h1">Email</th>
                <th class="name_h1">Message</th>
            </tr>
            <tr>
                <td>
                    {{ $contact->email }}
                </td>
                <td>
                    {{ $contact->message }}
                </td>
            </tr>
            

        </table>
    </div>
</header>
@endsection
