@extends('layout')
@section('title', 'Edit')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 mb-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@lang('students.edit_section_title')</h3>
                </div>
                <form action="{{route('etudiant.update', $etudiant->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('students.edit_name')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nom"
                                value="{{ $etudiant->nom }}" placeholder="@lang('students.edit_name_placeholder')">
                            @if ($errors->has('nom'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('nom') }}
                                </div>                                
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('students.edit_email'):</label>
                            <input type="email" class="form-control" id="exampleInputPassword1"
                                value="{{ $etudiant->user->email }}" name="email" placeholder="@lang('students.edit_email_placeholder')">
                            @if ($errors->has('email'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('email') }}
                                </div>                                
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('students.edit_address'):</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                value="{{ $etudiant->adresse }}" name="adresse" placeholder="@lang('students.edit_address_placeholder')">
                            @if ($errors->has('adresse'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('adresse') }}
                                </div>                                
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('students.edit_phone'):</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                value="{{ $etudiant->phone }}"  name="phone" placeholder="@lang('students.edit_phone_placeholder')">
                            @if ($errors->has('phone'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('phone') }}
                                </div>                                
                            @endif
                        </div>
                        <div class="form-group">
                            <label>@lang('students.edit_birth'):</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datepicker datetimepicker-input"
                                    value="{{ $etudiant->date_de_naissance }}" name="date_de_naissance"
                                    data-target="#reservationdate">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @if ($errors->has('date_de_naissance'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('date_de_naissance') }}
                                </div>                                
                            @endif
                        </div>
                        <div class="form-group" data-select2-id="58">
                            <label>@lang('students.edit_city'):</label>
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
                            @if ($errors->has('ville'))
                            <div class="text-danger mt-1">
                                {{ $errors->first('ville') }}
                            </div>                                
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('buttons.update')</button>
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
