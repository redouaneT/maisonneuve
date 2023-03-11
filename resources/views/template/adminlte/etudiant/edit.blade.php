@extends('layout')
@section('title', 'Edit')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile Étudiant</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">étudiant</a></li>
                    <li class="breadcrumb-item"><a href="#">Modifier étudiant</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 mb-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Moddifier un étudiant</h3>
                </div>
                <form action="{{route('etudiant.update', $etudiant->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nom"
                                value="{{ $etudiant->nom }}" placeholder="Entrer le nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email:</label>
                            <input type="email" class="form-control" id="exampleInputPassword1"
                                value="{{ $etudiant->email }}" name="email" placeholder="Enter le courriel">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Adresse:</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                value="{{ $etudiant->adresse }}" name="adresse" placeholder="Enter l'adresse">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Téléphone:</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                value="{{ $etudiant->phone }}"  name="phone" placeholder="Enter téléphone">
                        </div>
                        <div class="form-group">
                            <label>Date de naissance:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datepicker datetimepicker-input"
                                    value="{{ $etudiant->date_de_naissance }}" name="date_de_naissance"
                                    data-target="#reservationdate">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" data-select2-id="58">
                            <label>Ville:</label>
                            <select class="form-control select2 select2-hidden-accessible" name="ville_id"
                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach ($villes as $ville)
                                    @if ($etudiant->ville_id == $ville->id)
                                        <option value="{{ $ville->id }}" data-select2-id="3" selected>{{ $ville->nom }}
                                        </option>
                                    @else
                                        <option value="{{ $ville->id }}" data-select2-id="3">{{ $ville->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

    @push('scripts')
        <!-- Datepicker JS -->
        <script src="{{ asset('dist/js/bootstrap-datepicker.min.js') }}"></script>
    @endpush

@endsection