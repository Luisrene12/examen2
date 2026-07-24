@extends('layouts.app')

@section('title', 'Nuevo Servicio - Taller Automotriz')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-7">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h3 class="fw-bold text-dark mb-0">
                <i class="bi bi-file-earmark-plus text-primary me-2"></i> Registrar Nuevo Servicio
            </h3>
            <a href="{{ route('servicios.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Volver
            </a>
        </div>

        <div class="card card-custom shadow-sm border-0 p-4">
            <!-- Informative Banner about automatic user registration -->
            <div class="alert alert-info d-flex align-items-center gap-2 mb-4" role="alert">
                <i class="bi bi-info-circle-fill fs-5 text-info"></i>
                <div>
                    <strong>Registro automático:</strong> Este servicio se asignará automáticamente a tu usuario 
                    <span class="badge bg-primary ms-1">{{ Auth::user()->name }}</span>.
                </div>
            </div>

            <form action="{{ route('servicios.store') }}" method="POST">
                @csrf

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label fw-semibold">Nombre del Servicio <span class="text-danger">*</span></label>
                    <input type="text" 
                           name="nombre" 
                           id="nombre" 
                           class="form-control @error('nombre') is-invalid @enderror" 
                           value="{{ old('nombre') }}" 
                           placeholder="Ej. Cambio de Aceite y Filtro" 
                           required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-semibold">Descripción <span class="text-danger">*</span></label>
                    <textarea name="descripcion" 
                              id="descripcion" 
                              rows="3" 
                              class="form-control @error('descripcion') is-invalid @enderror" 
                              placeholder="Detalles sobre lo que incluye el servicio..." 
                              required>{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <!-- Precio -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="precio" class="form-label fw-semibold">Precio (Bs) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Bs</span>
                            <input type="number" 
                                   step="0.01" 
                                   name="precio" git push -u origin main
                                   id="precio" 
                                   class="form-control @error('precio') is-invalid @enderror" 
                                   value="{{ old('precio') }}" 
                                   placeholder="0.00" 
                                   required>
                        </div>
                        @error('precio')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Duración Estimada -->
                    <div class="col-12 col-md-6 mb-3">
                        <label for="duracion_estimada" class="form-label fw-semibold">Duración Estimada <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="duracion_estimada" 
                               id="duracion_estimada" 
                               class="form-control @error('duracion_estimada') is-invalid @enderror" 
                               value="{{ old('duracion_estimada') }}" 
                               placeholder="Ej. 1 hora 30 mins" 
                               required>
                        @error('duracion_estimada')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Estado -->
                <div class="mb-4">
                    <label for="estado" class="form-label fw-semibold">Estado inicial <span class="text-danger">*</span></label>
                    <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror" required>
                        <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En proceso" {{ old('estado') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                        <option value="Completado" {{ old('estado') == 'Completado' ? 'selected' : '' }}>Completado</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('servicios.index') }}" class="btn btn-light border px-4">Cancelar</a>
                    <button type="submit" class="btn btn-primary fw-semibold px-4">
                        <i class="bi bi-save me-1"></i> Guardar Servicio
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
