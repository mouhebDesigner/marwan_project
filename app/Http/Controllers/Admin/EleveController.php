<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EleveRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('role', 'eleve')->get();
        if(Auth::user()->isAdmin()){

            return view('admin.students.index', compact('students'));
        } else {
            
            return view('admin.students.indexFormateur', compact('students'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EleveRequest $request)
    {
        $user = User::create($request->all());

        

        return redirect('admin/students')->with('created', 'Elève a été ajouté avec succé');
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
    public function edit(User $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        $request->validate([
            'numtel' => "required | numeric | digits:8 | unique:users,numtel,".$student->id.",id",
            'cin' => "required | numeric | digits:8 | unique:users,cin,".$student->id.",id",
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$student->id.",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'adresse' => 'required | string | max:255',
        ]);

        
        $student->update($request->all());

   

        $student->save();



        return redirect('admin/students')->with('created', 'Elève a été modifié avec succé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {

        $student->delete();

        return redirect('admin/students')->with('deleted', 'Cet élève a été supprimé avec succé');
        
    }
}
