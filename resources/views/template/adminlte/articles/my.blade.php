@extends('layout')
@section('title', 'My Articles')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@lang('articles.my_page_title')</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('articles.my_section_title')</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang('articles.title')</th>
                                <th>@lang('articles.content')</th>
                                <th>@lang('articles.list_action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->content }}</td>
                                    <td>
                                        <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-primary">@lang('buttons.see')</a>
                                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning">@lang('buttons.edit')</a>
                                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">@lang('buttons.delete')</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
