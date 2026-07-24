@extends('layouts.app')

@section('title', 'Iniciar Sesión - Taller Automotriz')

@section('content')
<div class="row justify-content-center align-items-center min-vh-75 my-5">
    <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
        <div class="card card-custom p-4 shadow-lg border-0">
            <div class="text-center mb-4">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow" style="width: 70px; height: 70px;">
                    <i class="bi bi-wrench-adjustable fs-1"></i>
                </div>
                <h3 class="fw-bold text-dark mb-1">Taller Automotriz</h3>
                <p class="text-muted small">Ingrese sus credenciales para acceder al sistema</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-3" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    <div>
                        <strong>Acceso denegado:</strong> Por favor verifique los datos ingresados.
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-secondary">
                        <i class="bi bi-envelope me-1"></i> Correo Electrónico
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-secondary"><i class="bi bi-person"></i></span>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}" 
                               placeholder="ejemplo@taller.com" 
                               required 
                               autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block mt-1">
                            <i class="bi bi-x-circle me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold text-secondary">
                        <i class="bi bi-lock me-1"></i> Contraseña
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light text-secondary"><i class="bi bi-key"></i></span>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="••••••••" 
                               required>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block mt-1">
                            <i class="bi bi-x-circle me-1"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label text-secondary small" for="remember">Recordar sesión</label>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
