@extends('layout')
@section('title', 'Créer profil étudiant')
@section('content')
<div class="content-header">
 
</div>
<div class="content">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 mb-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@lang('students.create_title')</h3>
                </div>
                <form method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('students.create_name')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nom"
                                placeholder="@lang('students.create_name_placeholder')">
                            @if ($errors->has('nom'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('nom') }}
                                </div>                                
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('students.create_address'):</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="adresse"
                                placeholder="@lang('students.create_address_placeholder')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('students.create_phone'):</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="phone"
                                placeholder="@lang('students.create_phone_placeholder')">
                            @if ($errors->has('phone'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('phone') }}
                                </div>                                
                            @endif
                        </div>
                        <div class="form-group">
                            <label>@lang('students.create_birth'):</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datepicker datetimepicker-input"
                                    name="date_de_naissance" data-target="#reservationdate">
                                <div class="input-group-append" data-target="#reservationdate"
                                    data-toggle="datetimepicker">
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
                            <label>@lang('students.create_city'):</label>
                            <select class="form-control select2 select2-hidden-accessible" name="ville_id"
                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach ($villes as $ville)
                                    <option value="{{ $ville->id }}" data-select2-id="3">{{ $ville->nom }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('ville_id'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('ville_id') }}
                                </div>                                
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('buttons.add')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <!-- Datepicker JS -->
    <script src="{{ asset('dist/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@endsection
