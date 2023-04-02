@extends('layout')
@section('title', 'Upload Document')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Upload Document</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 mb-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Upload a document</h3>
                </div>
                <form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title">
                            @error('title')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">Document (PDF, ZIP, etc.)</label>
                                <input type="file" class="form-control-file" id="file" name="file">
                                @error('file')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    