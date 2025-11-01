@extends('layouts.main')
@section('title', 'Log In')
@section('content')
    <div class="login-page row px-2 px-sm-0">
        <div class="col-sm-10 col-md-8 col-lg-5 bg-light rounded p-2 m-auto">
            <h1 class="border-bottom border-3">Log In</h1>
            <form action="{{ route('login_store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="col-form-label" for="username">Username</label>
                    <input class="form-control @error('username') is-invalid @enderror"
                           id="username"
                           name="username"
                           required>
                    <div class="invalid-feedback">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="password">Password</label>
                    <input class="form-control @error('username') is-invalid @enderror"
                           type="password"
                           id="password"
                           name="password"
                           required minlength="6">
                    <div class="invalid-feedback">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
            
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a class="my-auto ms-auto pe-1" href="{{ route('signup_index') }}">Don't have an account?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
