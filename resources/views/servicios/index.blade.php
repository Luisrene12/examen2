@extends('layouts.app')

@section('title', 'Módulo de Servicios - Taller Automotriz')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-0">
            <i class="bi bi-tools text-primary me-2"></i> Módulo de Servicios
        </h2>
        <p class="text-muted mb-0 small">Gestión y registro de servicios del taller automotriz</p>
    </div>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary shadow-sm fw-semibold d-flex align-items-center gap-2">
        <i class="bi bi-plus-circle-fill"></i> Nuevo Servicio
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill fs-5 text-success"></i>
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card card-custom shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Duración Estimada</th>
                        <th>Estado</th>
                        <th>Creado por (Usuario)</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($servicios as $servicio)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">#{{ $servicio->id }}</td>
                            <td>
                                <span class="fw-bold text-dark">{{ $servicio->nombre }}</span>
                            </td>
                            <td>
                                <span class="text-muted">{{ Str::limit($servicio->descripcion, 50) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border fs-6 fw-semibold">
                                    Bs. {{ number_format($servicio->precio, 2) }}
                                </span>
                            </td>
                            <td>
                                <i class="bi bi-clock me-1 text-muted"></i>{{ $servicio->duracion_estimada }}
                            </td>
                            <td>
                                @if($servicio->estado == 'Pendiente')
                                    <span class="badge bg-warning text-dark px-3 py-2"><i class="bi bi-hourglass-split me-1"></i>Pendiente</span>
                                @elseif($servicio->estado == 'En proceso')
                                    <span class="badge bg-info text-dark px-3 py-2"><i class="bi bi-gear-fill spin me-1"></i>En proceso</span>
                                @elseif($servicio->estado == 'Completado')
                                    <span class="badge bg-success px-3 py-2"><i class="bi bi-check-all me-1"></i>Completado</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">{{ $servicio->estado }}</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-medium">
                                    <i class="bi bi-person-fill me-1"></i>{{ $servicio->user ? $servicio->user->name : 'N/A' }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-outline-warning" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este servicio?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                                No hay servicios registrados actualmente.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
