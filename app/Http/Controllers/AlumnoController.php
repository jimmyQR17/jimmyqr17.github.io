<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index(){

        $alumnos = Alumno::get();
        return view('home.index', compact('alumnos'));

    }

    public function store(Request $request){

        $alumno = New Alumno();
        $alumno->nombre =  $request->nombre;
        $alumno->apellido =  $request->apellido;
        $alumno->fechaDeNacimiento =  $request->fechaDeNacimiento;
        $alumno->telefono =  $request->telefono;
        $alumno->TZapato =  $request->TZapato;
        $alumno->TDePolo =  $request->TDePolo;
        $alumno->TDePantalon =  $request->TDePantalon;

        $alumno->save();

        return redirect()->route('home');

    }

    public function update(Request $request, $id){

        $alumno = Alumno::find($id); // Obtener el registro que deseas actualizar
        $alumno->nombre =  $request->nombre;
        $alumno->apellido =  $request->apellido;
        $alumno->fechaDeNacimiento =  $request->fechaDeNacimiento;
        $alumno->telefono =  $request->telefono;
        $alumno->TZapato =  $request->TZapato;
        $alumno->TDePolo =  $request->TDePolo;
        $alumno->TDePantalon =  $request->TDePantalon;
        $alumno->save();
        return redirect()->route('home');
    }

    public function delete(Request $request, $id){

        $alumno = Alumno::find($id);
        $alumno->delete();

        return redirect()->route('home');

    }
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return response()->json($alumno); // Devolver los datos del alumno en formato JSON
    }

}
