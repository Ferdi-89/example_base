@extends('layouts.main')

@section('title', 'Register - Akademik')

@section('container')
<div class="row justify-content-center align-items-center my-5" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow border-0 rounded-3">
            <div class="card-body p-5">
                <h3 class="text-center mb-4 fw-bold text-primary">Sign Up</h3>
                
                <form action="/register" method="post">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Lengkap" required value="{{ old('name') }}" autofocus>
                        <label for="name">Nama Lengkap</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password" required>
                        <label for="password_confirmation">Konfirmasi Password</label>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Verifikasi Captcha</label>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <img src="{{ $captchaImage }}" alt="Captcha" class="img-thumbnail border shadow-sm" style="height: 60px;">
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="window.location.reload();" title="Segarkan Captcha">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" id="captcha" placeholder="Masukkan kode di atas" required autocomplete="off">
                            <label for="captcha">Masukkan Kode Captcha</label>
                            @error('captcha')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <button class="w-100 btn btn-primary btn-lg rounded-pill shadow-sm mb-3" type="submit">Register</button>
                    
                    <div class="text-center">
                        <small class="text-muted">Sudah punya akun? <a href="/login" class="text-primary text-decoration-none fw-semibold">Login disini</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
