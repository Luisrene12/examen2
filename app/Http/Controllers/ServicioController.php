<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    /**
     * Listado de servicios con su usuario creador.
     */
    public function index()
    {
        $servicios = Servicio::with('user')->latest()->get();
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Formulario para crear un nuevo servicio.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Registra automáticamente el usuario autenticado que creó el servicio.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'precio' => ['required', 'numeric', 'min:0'],
            'duracion_estimada' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'string'],
        ], [
            'nombre.required' => 'El nombre del servicio es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'duracion_estimada.required' => 'La duración estimada es obligatoria.',
            'estado.required' => 'El estado es obligatorio.',
        ]);

        // Registrar el usuario autenticado que creó el servicio automáticamente
        $validated['user_id'] = Auth::id();

        Servicio::create($validated);

        return redirect()->route('servicios.index')->with('success', 'Servicio registrado correctamente.');
    }

    /**
     * Formulario de edición de un servicio.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Actualizar los datos de un servicio.
     */
    public function update(Request $request, Servicio $servicio)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string'],
            'precio' => ['required', 'numeric', 'min:0'],
            'duracion_estimada' => ['required', 'string', 'max:100'],
            'estado' => ['required', 'string'],
        ]);

        $servicio->update($validated);

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    /**
     * Eliminar un servicio.
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}
