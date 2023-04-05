<?php

namespace App\Http\Controllers\admin;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::with('ville')->simplePaginate(10);
        return view('template/adminlte/admin/etudiant/index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('template/adminlte/admin/etudiant/create', ['villes' => $villes]);
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
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|max:20|confirmed',
            "password_confirmation" => "required|min:6|max:20"
        ]);

        

        // extract signup informations from the request
        $user = new User;
        $request['role_id'] = Role::where('name', 'student');
        $user->fill($request->only(['username', 'email', 'password', 'role_id']));
        $user->password = Hash::make($request->password);
        $user->save();
   
        $etudiant = new Etudiant;
        $request['user_id'] = $user->id;
        $etudiant->fill($request->only(['nom', 'phone', 'date_de_naissance', 'adresse', 'ville_id', 'user_id']));
        $etudiant->save();

        return redirect(route('admin.etudiant.show', $etudiant->id))->withSuccess("@lang('students.confirmation_add')");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('template/adminlte/admin/etudiant/show', ['etudiant' => $etudiant]);
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
        return view('template/adminlte/admin/etudiant/edit', ['etudiant' => $etudiant, 'villes' => $villes]);
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


        $etudiant->fill($request->all());

    

        $etudiant->update();

        return redirect(route('admin.etudiant.show', $etudiant))->withSuccess("@lang('students.confirmation_update')");
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
        return redirect(route('admin.etudiant.index'))->withSuccess("@lang('students.confirmation_delete')");
    }
}