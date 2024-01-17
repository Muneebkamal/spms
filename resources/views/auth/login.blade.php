@extends('layouts.auth')

@section('title', 'Home Page')

@section('content')
<div class="w-px-400 mx-auto">
        <!-- Login -->
        <div class="app-brand justify-content-start mb-4 mt-2">
            <img src="{{ asset('assets/img/default-imgs/logo-big.jpeg') }}" width="150" height="85" alt="">
        </div>
        <h3 class="mb-1 pt-2">Welcome to SPMS! 👋</h3>
        <p class="mb-4">Please sign-in to your account and start the adventure</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                        <small>Forgot Password?</small>
                    </a>
                </div>
                <div class="input-group input-group-merge">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required
                        autocomplete="current-password">
                    <span class="input-group-text cursor-pointer">
                        <i class="ti ti-eye-off"></i>
                    </span>
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
        </form>
        <p class="text-center">
            <span>New on our platform?</span>
            <a href="auth-register-basic.html">
                <span>Create an account</span>
            </a>
        </p>
</div>
@endsection
