@extends('layout')
@section('title', 'student dashboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-header">
                            <h3 class="card-title">@lang('articles.recent')</h3>
                            <div class="card-tools">
                                {{ $articles }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($articles as $article) 
                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title text-primary">{{ $article->title }}</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>{{ Str::limit($article->content, 100) }}</p>
                                            <p class="text-muted"><i class="far fa-calendar-alt"></i> {{ $article->created_at}}</p>
                                            <p class="text-muted"><i class="fas fa-user"></i> {{ $article->user->username }}</p>
                                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-eye"></i>  @lang('buttons.more')</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
@endsection
