<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Actualite;
use Illuminate\Http\Request;
use App\Http\Requests\ActualiteRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ActualiteUpdateRequest;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $actualites = Actualite::paginate(10);

        return view('admin.actualites.index', compact('actualites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.actualites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActualiteRequest $request)
    {
        
        $actualite = Actualite::create($request->all());

        
        if($request->hasFile('image')){
            $actualite->image = $request->image->store('images');
            $actualite->save();
        }
        
        return redirect('admin/actualites')->with('created', 'L\'actualité à été crée avec succée');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actualite $actualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actualite $actualite)
    {

        return view('admin.actualites.edit', compact('actualite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actualite $actualite)
    {
        $actualite->update($request->all());
        if($request->hasFile('image')){
            $actualite->image = $request->image->store('images');
            $actualite->save();
        }
        return redirect('admin/actualites')->with('updated', 'La Actualite à été modifié avec succée');
        
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actualite $actualite)
    {
        $actualite->delete();

        return redirect('admin/actualites')->with('deleted', 'Cette actualité a été supprimé avec succé');
    }
}
