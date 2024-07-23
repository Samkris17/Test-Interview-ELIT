@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid" style="margin-top: 80px">
        <div class="row no-gutters shadow">
            <div class="col-lg-6 p-4" style="display: flex; justify-content: center; align-items: center;">
                <div>
                    <img src="img/logo-elit.png" width="200px" alt="Logo">
                </div>
            </div>                                                                   
            <div class="col-lg-6 p-4" style=" background-color: #ececf6">
                <div class="login-form">
                    <h3>Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="your@email.com">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <p class="text-center mt-3">Not a member? <a class="" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
