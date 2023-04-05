@extends('layout')
@section('title', 'login')
@section('content')
<div class="content d-flex justify-content-center align-items-center pt-5 ">
    <div class="login-box ">
        <div class="login-logo">
            <a href="{{ route('home', ['id' => 1]) }}"><b>Forum Maisonneuve</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">@lang('auth.login_info')</p>
                <form action="{{route("login")}}" method="post">
                @csrf
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(!$errors->isEmpty())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                            {{ $error }}<br>
                    @endforeach
                    </div>
                @endif
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="@lang('auth.email_label')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
    
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="@lang('auth.password_label')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block my-2">@lang('buttons.login')</button>
                    </div>
                </form>
      
                <p class="mb-0">
                    <a href="{{route("user.registration")}}" class="text-center">@lang('navigation.new_account')</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
