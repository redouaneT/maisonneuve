<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('template/adminlte/etudiant/create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:30',
            'phone' => 'required',
            'date_de_naissance' => 'required|date',
            'adresse' => 'required',
            'ville_id' => 'required|integer',
        ]);
    
        $request['user_id'] = Auth::user()->id;
    
        $etudiant = new Etudiant;
        $etudiant->fill($request->all());
        $etudiant->save();
    
        // Assign the 'student' role to the new user
        $studentRole = Role::where('name', 'student')->first();
        if ($studentRole) {
            $user = Auth::User();
            $user->role_id = $studentRole->id;
            $user->save();
        }
    
        return redirect(route('home'))->withSuccess("@lang('students.confirmation_add')");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::where('user_id', $id)->first();
        return view('template/adminlte/etudiant/show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('template/adminlte/etudiant/edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {

        $request->validate([
            'nom' => 'required|max:30',
            'email' => 'required|email',
            'phone' => 'required',
            'date_de_naissance' => 'required|date',
            'adresse' => 'required',
            'ville_id' => 'required|integer',
        ]);
     

        $etudiant->fill($request->except('email'));
        $etudiant->user()->update(['email' => $request->email]);

        $etudiant->update();

     

        return redirect(route('etudiant.show', $etudiant->user->id))->withSuccess(__("students.confirmation_update"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect(route('logout'))->withSuccess("@lang('students.confirmation_delete')");
    }
}