@extends('layouts.app')

@section('title', 'Login Pengelola - Desa Jalatrang')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-dark text-white p-3">
                    <h5 class="card-title mb-0 fs-6"><i class="bi bi-box-arrow-in-right me-2 text-warning"></i> Login Pengelola</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Email Akun</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="admin@desa.test">
                            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required placeholder="••••••••">
                            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="ingat" class="form-check-input" id="ingat">
                            <label class="form-check-label small" for="ingat">Ingat saya</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection