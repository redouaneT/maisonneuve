@extends('layout')
@section('title', 'Voir un article')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Voir un article</h1>
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
                <h3 class="card-title">{{ $article->title }}</h3>
            </div>
            <div class="card-body">
                <p style="max-width: 85ch;">{{ $article->content }}</p>
                <p><strong>Date de publication:</strong> {{ $article->created_at }}</p>
                <p><strong>Auteur:</strong> {{ $article->user->username }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm">Retour à la liste des articles</a>
                @if (Gate::allows('update-article', $article))
                                         
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm">Modifier</a>
            
                
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
             
                @endif
              
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
