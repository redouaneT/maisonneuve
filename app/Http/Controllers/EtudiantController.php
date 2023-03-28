<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('template/adminlte/etudiant/index', ['etudiants' => $etudiants]);
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

        return redirect(route('etudiant.show', $etudiant->id))->withSuccess("L'étudiant a bien été ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
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
            'email' => 'required|email|unique:etudiants',
            'phone' => 'required',
            'date_de_naissance' => 'required|date',
            'adresse' => 'required',
            'ville_id' => 'required|integer',
        ]);

        $etudiant->fill($request->all());

        $etudiant->update();

        return redirect(route('etudiant.show', $etudiant))->withSuccess("L'étudiant a bien été modifié");
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
        return redirect(route('etudiant.index'))->withSuccess("L'étudiant a bien été supprimer");
    }
}