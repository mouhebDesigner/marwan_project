<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formateurs = User::where('role', 'formateur')->get();

        return view('admin.formateurs.index', compact('formateurs'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        return redirect('admin/formateurs')->with('created', 'Elève a été ajouté avec succé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $formateur)
    {
        return view('admin.formateurs.edit', compact('formateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $formateur)
    {
        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        $request->validate([
            'numtel' => "required | numeric | digits:8 | unique:users,numtel,".$formateur->id.",id",
            'cin' => "required | numeric | digits:8 | unique:users,cin,".$formateur->id.",id",
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$formateur->id.",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'adresse' => 'required | string | max:255',
        ]);

        
        $formateur->update($request->except('password'));

        if($request->password != ""){
            $formateur->password = Hash::make($request->password);

            $formateur->save();
        }
        $formateur->save();


        return redirect('admin/formateurs')->with('created', 'Formateur a été modifié avec succé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $formateur)
    {

        $formateur->delete();

        return redirect('admin/formateurs')->with('deleted', 'Cet élève a été supprimé avec succé');
        
    }
}
