@extends('layout')
@section('title', 'Articles')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Articles</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des articles</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Date de publication</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->user->username }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>
                                        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary btn-sm">Voir</a>
                                        @if (Gate::allows('update-article', $article))
                                         
                                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    
                                         
                                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                            </form>
                                         
                                        @endif
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
</div>
@endsection
