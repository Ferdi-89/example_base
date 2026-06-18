@extends('layouts.main')

@section('title', 'Login - Akademik')

@section('container')
<div class="row justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="col-md-5">
        <div class="card shadow border-0 rounded-3">
            <div class="card-body p-5">
                <h3 class="text-center mb-4 fw-bold text-primary">Sign In</h3>
                
                @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-primary btn-lg rounded-pill shadow-sm" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
