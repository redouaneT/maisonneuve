@extends('layout')
@section('title', 'Voir les étudiants')
@section('content')
<div class="content">

</div>
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <section class="content-header">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Listes des étudiants</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">etudiant</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des étudiants</h3>
                        <div class="card-tools">
                            {{ $etudiants }}
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 10%">
                                        Nom
                                    </th>
                                    <th style="width: 20%">
                                        Adresse
                                    </th>
                                    <th style="width: 10%">
                                        Télephone
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Courriel
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Date de naissance
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Ville
                                    </th>
                                    <th style="width: 30%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etudiants as $etudiant)
                                    <tr>
                                        <td>
                                            {{ $etudiant->id }}
                                        </td>
                                        <td>
                                            {{ $etudiant->nom }}
                                        </td>
                                        <td>
                                            {{ $etudiant->adresse }}
                                        </td>
                                        <td>
                                            {{ $etudiant->phone }}
                                        </td>
                                        <td>
                                            {{ $etudiant->email }}
                                        </td>
                                        <td>
                                            {{ $etudiant->date_de_naissance }}
                                        </td>
                                        <td>
                                            {{ $etudiant->ville->nom }}
                                        </td>
                                        <td class="panel-control">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.etudiant.show', $etudiant->id) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                Voir
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.etudiant.edit', $etudiant->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Moddifier
                                            </a>
                                            <form action="{{ route('admin.etudiant.delete', $etudiant->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Spprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
