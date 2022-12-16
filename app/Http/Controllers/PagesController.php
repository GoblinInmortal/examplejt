<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\curso;

class PagesController extends Controller
{
    public function fnIndex(){
        return view('welcome');
    }


    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnEliminar($id){
        $xdeletAlumno = Estudiante::findOrFail($id);
        $xdeletAlumno -> delete ();

        return back()->with('msj','Se Elimino con exito :( ');
    }
  

    public function fnUpdate(Request $request, $id){

        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos->codEst = $request -> codEst;
        $xUpdateAlumnos->nomEst = $request -> nomEst;
        $xUpdateAlumnos->apeEst = $request -> apeEst;
        $xUpdateAlumnos->fnaEst = $request -> fnaEst;
        $xUpdateAlumnos->turMat = $request -> turMat;
        $xUpdateAlumnos->semMat = $request -> semMat;
        $xUpdateAlumnos->estMat = $request -> estMat;
        
        $xUpdateAlumnos-> save();

        return back()->with('msj','Se Actualizo con exito :3 ');
    }    


    public function fnRegistrar(Request $request){

        $request -> validate(['codEst' =>'required', 'nomEst' =>'required','apeEst' =>'required','fnaEst' =>'required','turMat' =>'required','semMat' =>'required','estMat' =>'required' ]);

        $nuevoEstudiante = new Estudiante;

        $nuevoEstudiante->codEst = $request -> codEst;
        $nuevoEstudiante->nomEst = $request -> nomEst;
        $nuevoEstudiante->apeEst = $request -> apeEst;
        $nuevoEstudiante->fnaEst = $request -> fnaEst;
        $nuevoEstudiante->turMat = $request -> turMat;
        $nuevoEstudiante->semMat = $request -> semMat;
        $nuevoEstudiante->estMat = $request -> estMat;
        
        $nuevoEstudiante-> save();

        return back()->with('msj','Se registro con exito :3 ');
    }

    public function fnLista(){
        $xAlumnos = Estudiante::all();
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria($numero=0){
        $valor=$numero;
        $otro=25;
        //return view('pagGaleria', ['valor' => $numero, 'otro' => 25]);
        return view('pagGaleria', compact('valor','otro'));
    }

    //////////////////////////////////////// CURSO //////////////////////

    public function fnListaCurso(){
        $xCursos = Curso::all();
        return view ('pagListaCurso', compact('xCursos'));
    }
    
    public function fnRegistrarCurso(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
            'denCur' => 'required',
            'hrsCur' => 'required',
            'creCur' => 'required',
            'plaCur' => 'required',
            'tipCur' => 'required',
            'estCur' => 'required'
        ]);
            
        $nuevoCurso = new Curso;
        $nuevoCurso->denCur = $request->denCur;
        $nuevoCurso->hrsCur = $request->hrsCur;
        $nuevoCurso->creCur = $request->creCur;
        $nuevoCurso->plaCur = $request->plaCur;
        $nuevoCurso->tipCur = $request->tipCur;
        $nuevoCurso->estCur = $request->estCur;
        
        $nuevoCurso->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro el curso con éxito :3'); //Regresar con msj
    }
    
    public function fnEstActualizarCurso($id){                   //Paso 1

        $xActCurso = Curso::findOrFail($id);
        return view('Curso.pagActualizarCurso', compact('xActCurso'));
    }

    public function fnUpdateCurso(Request $request, $id){        //Paso 2

        //return $request->all();         //Prueba de "token" y datos recibidos

        $xUpdateCurso = Curso::findOrFail($id);

        $xUpdateCurso->denCur = $request->denCur;
        $xUpdateCurso->hrsCur = $request->hrsCur;
        $xUpdateCurso->creCur = $request->creCur;
        $xUpdateCurso->plaCur = $request->plaCur;
        $xUpdateCurso->tipCur = $request->tipCur;
        $xUpdateCurso->estCur = $request->estCur;
        
        $xUpdateCurso->save();
        
        //$xAlumnos = Estudiante1::all();                        //Datos de BD
        //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
        return back()->with('msj','Se actualizó con éxito :3');  //Regresar con msj
    }
    
    //////////////////// DELETE /////////////////////////////////// 
    public function fnEliminarCurso(Request $request, $id){
        $deleteCurso = Curso::findOrFail($id);
        $deleteCurso->delete();
        return back()->with('msj','Se elimino el curso con éxito :(');
    
    }
    
    public function fnDetalleCurso($id){
        $xDetCurso = Curso::findOrFail($id);
        return view ('Curso.pagDetalleCurso', compact('xDetCurso'));
    }




}
