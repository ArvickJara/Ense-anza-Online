<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CursoController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'alumno') {
            return redirect('/home');
        }

        return view('cursos.index');
    }

    public function create()
    {
        if (Auth::user()->role !== 'profesor') {
            return redirect('/home');
        }

        return view('cursos.crear');
    }
}
