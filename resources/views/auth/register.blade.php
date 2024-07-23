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
                        <h3>Register</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="name">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="password-confirm">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                            <p class="text-center mt-3">Already a member? <a class="" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
