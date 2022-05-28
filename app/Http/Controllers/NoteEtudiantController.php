<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class NoteEtudiantController extends Controller
{
    public function index()
    {
        $notes = Auth::user()->notes()->get();

        return view('notes.index', compact('notes'));
    }
}
