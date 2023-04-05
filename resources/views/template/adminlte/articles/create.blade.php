@extends('layout')
@section('title', 'Créer un article')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@lang('articles.create')</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 mb-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@lang('articles.article_add_info')</h3>
                </div>
                <form method="post" action="{{ route('articles.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">@lang('articles.title')</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="@lang('articles.title_label')">
                            @error('title')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">@lang('articles.content')</label>
                            <textarea class="form-control" id="content" name="content" rows="5"
                                placeholder="@lang('articles.content_label')"></textarea>
                            @error('content')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
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

