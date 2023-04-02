@extends('layout')
@section('title', 'List of Documents')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Documents</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des documents</h3>

                        <a href="{{ route('documents.create') }}" class="btn btn-primary float-right">Upload Document</a>
                        <div class="card-tools">
                            {{ $documents }}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Format</th>
                                    <th>Partagé par</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $document)
                                <tr>
                                    <td>{{ $document->title }}</td>
                                    <td>@if ($document->type){{ $document->type }}@else Inconnue @endif</td>
                                    <td>{{ $document->user->username }}</td>
                                    <td>
                                        <a href="{{ route('documents.download', $document->id) }}" class="btn btn-sm btn-primary">Télécharger</a>
                                        @if (Gate::allows('update-document', $document))
                                            <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Upprimer</button>
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
