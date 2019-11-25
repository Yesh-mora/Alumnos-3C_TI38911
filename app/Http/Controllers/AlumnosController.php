<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarrerasModel;
use App\AlumnosModel;
use Illuminate\Support\Facades\DB;
class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
     $this->middleware('auth');   
    }

    public function index()
    {
        $carreras= CarrerasModel::all();
        $alumnos = AlumnosModel::
        /*$alumnos= DB::table('alumnos')*/
        select("matricula","alumno.nombre","apellidos","correo","carreras.nombre AS car")
        ->join("carreras","carreras.id","=","alumno.carrera")
        ->get();
        return view("alumnos",compact("carreras","alumnos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(AlumnosModel::where("matricula",$request->matricula)->exists())
        {
        return redirect("/alumnos")
        ->with('error','Ya existe un alumno con esa matricula');  
        }
        else if(AlumnosModel::where("correo",$request->correo)->exists())
        {
        return redirect("/alumnos")
        ->with('error',"El correo ".$request->correo." ya existe");
        }
        else 
        {
        $alumnos=new AlumnosModel();
        $alumnos->matricula=$request->matricula;
        $alumnos->nombre=$request->nombre;
        $alumnos->apellidos=$request->apellidos;
        $alumnos->correo=$request->correo;
        $alumnos->carrera=$request->carrera;
        $alumnos->save();
        return redirect("/alumnos")
        ->with('success','Alumno guardado');  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(AlumnosModel::where("matricula",$id)->exists())
        {
        $carreras=CarrerasModel::all();
        $alumno=AlumnosModel::select('*')
        ->where('matricula','=',$id)
        ->get();
        return view("editaAlumno", compact('alumno','carreras'));  
        }
        else
        {
        return redirect("/alumnos")
        ->with('error',"No existe la matricula".$id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumnos= AlumnosModel::find($id);
        $alumnos->matricula=$request->matricula;
        $alumnos->nombre=$request->nombre;
        $alumnos->apellidos=$request->apellidos;
        $alumnos->correo=$request->correo;
        $alumnos->carrera=$request->carrera;
        $alumnos->save();
        return redirect("/alumnos")
        ->with('success','carrera guardada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno=AlumnosModel::find($id);
        $alumno->delete();
        return redirect("/alumnos")->with('success','Descanza en paz el alumno');
    }
}
