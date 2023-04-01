@extends('layout')

@section('title', 'signup')

@section('content')
<div class="content d-flex justify-content-center align-items-center pt-5">
    <div class="signup-box">
        <div class="login-logo">
            {{-- <a href="{{ route('public.dashboard', ['id' => 1]) }}"><b>Forum Maisonneuve</b></a> --}}
        </div>
        <div class="card">
            <div class="card-body signup-card-body">
                <p class="signup-box-msg">Créer un nouveau compte</p>
                <form action="{{ route('user.registration') }}" method="post">
                    @csrf
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="d-flex flex-column  mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('username'))
                            <div class="text-danger mt-1">
                                {{ $errors->first('username') }}
                            </div>                                
                        @endif
                    </div>
                    <div class="d-flex flex-column  mb-3">
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <div class="text-danger mt-1">
                                {{ $errors->first('email') }}
                            </div>                                
                        @endif
                    </div>
                    <div class="d-flex flex-column  mb-3">
                        <div class="input-group ">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <div class="text-danger mt-1">
                                {{ $errors->first('password') }}
                            </div>                                
                        @endif
                    </div>
                    <div class="d-flex flex-column  mb-3">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <div class="text-danger mt-1">
                                {{ $errors->first('password_confirmation') }}
                            </div>                                
                        @endif
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block my-2">S'inscrire</button>
                    </div>
                </form>
                <p class="mb-0">
                    <a href="{{ route('login') }}" class="text-center">J'ai déjà un compte</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
