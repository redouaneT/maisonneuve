@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="col-md-6 mx-auto mt-5 mb-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('students.show_title')</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('adminlte/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{$etudiant->nom }}</h3>
                            <p class="text-muted text-center">@lang('students.show')</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>@lang('students.show_email')</b> <a class="float-right">{{ $etudiant->user->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('students.show_address')</b> <a class="float-right">{{ $etudiant->adresse }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('students.show_phone')</b> <a class="float-right">{{ $etudiant->phone }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('students.show_birth')</b> <a class="float-right">{{ $etudiant->date_de_naissance }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('students.show_city')</b> <a class="float-right">{{ $etudiant->ville->nom }}</a>
                                </li>
                            </ul>
                            <a href="{{ route('etudiant.edit', $etudiant->id) }}"
                                class="btn btn-primary btn-block mb-1"><b>@lang('buttons.edit')</b></a>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <!-- Datepicker JS -->
        <script src="{{ asset('dist/js/bootstrap-datepicker.min.js') }}"></script>
    @endpush

@endsection
