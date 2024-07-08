<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Mostrar todos los cursos
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'student' && !Auth::user()->subscription) {
            return redirect()->route('subscription.show');
        }

        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Guardar un nuevo curso
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'categoria' => 'required|string|max:255',
            'materiales' => 'nullable|file|mimes:pdf',
            'conocimientos_previos' => 'nullable',
            'herramientas' => 'nullable',
            'videos' => 'nullable|file|mimes:mp4,avi,mov',
        ]);

        $data = $request->all();

        if ($request->hasFile('materiales')) {
            $data['materiales'] = $request->file('materiales')->store('materiales', 'public');
        }

        if ($request->hasFile('videos')) {
            $data['videos'] = $request->file('videos')->store('videos', 'public');
        }

        Curso::create($data);

        return redirect('/cursos')->with('success', 'Curso creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    // Mostrar un curso específico
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   // Mostrar el formulario para editar un curso
   public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Actualizar un curso 
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'categoria' => 'required|string|max:255',
            'materiales' => 'nullable|file|mimes:pdf',
            'conocimientos_previos' => 'nullable',
            'herramientas' => 'nullable',
            'videos' => 'nullable|file|mimes:mp4,avi,mov',
        ]);

        $data = $request->all();

        if ($request->hasFile('materiales')) {
            $data['materiales'] = $request->file('materiales')->store('materiales', 'public');
        }

        if ($request->hasFile('videos')) {
            $data['videos'] = $request->file('videos')->store('videos', 'public');
        }

        $curso->update($data);

        return redirect('/cursos')->with('success', 'Curso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Eliminar un curso
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect('/cursos')->with('success', 'Curso eliminado exitosamente.');
    }

    //mostrar cursos en welcome
    public function mostrarCursos()
    {
        $cursos = Curso::all();
        return view('welcome', compact('cursos'));
    }
}
