@extends('layouts.main')
@section('title', 'Create Account')
@section('content')
    <div class="login-page row px-2 px-sm-0">
        <div class="col-sm-10 col-md-8 col-lg-5 bg-light rounded p-2 m-auto">
            <h1 class="border-bottom border-3">Create Account</h1>
            <form action="{{ route('signup_store') }}" method="post">
                @csrf
                <div class="my-3">
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
                    <label class="col-form-label" for="email">Email</label>
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           name="email"
                           required>
                    <div class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="password">Password</label>
                    <input class="form-control @error('password') is-invalid @enderror"
                           type="password"
                           id="password"
                           name="password"
                           required
                           minlength="6">
                    <div class="invalid-feedback">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="password_confirmation">Repeat Password</label>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="password_confirmation"
                           name="password_confirmation"
                           required>
                    <div class="invalid-feedback">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a class="my-auto ms-auto pe-1" href="{{ route('login_index') }}">
                        Already have an account? Log In
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
