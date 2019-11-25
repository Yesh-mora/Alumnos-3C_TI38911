<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarrerasModel;
use App\AlumnosModel;
use Illuminate\Support\Facades\DB;

class controladorCarrerras extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
     $this->middleware('auth');   
    }
    public function index() {
        $carreras = CarrerasModel::all();
        $camino = CarrerasModel::select("id", "carreras.nombre", "carreras.nombre AS car")
                ->get();

        return view("carrera", compact("camino", "carreras"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (CarrerasModel::where("id", $request->id)->exists()) {
            return redirect("/carrera")
                            ->with('error', 'Ya existe un alumno con esa matricula');
        } else {
            $camino = new CarrerasModel();
            $camino->id = $request->id;
            $camino->nombre = $request->nombre;

            $camino->save();
            return redirect("/carrera")
                            ->with('success', 'Alumno guardado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(CarrerasModel::where("id",$id)->exists())
        {
        $carreras=CarrerasModel::all();
        $camino=  CarrerasModel::select('*')
        ->where('id','=',$id)
        ->get();
        return view("editaAlumno", compact('camino','carreras'));  
        }
        else
        {
        return redirect("/carrera")
        ->with('error',"No existe la matricula".$id);
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        
        
         $camino= CarrerasModel::find($id);
        $camino->id=$request->id;
        $camino->nombre=$request->nombre;
        
        $camino->save();
        return redirect("/carrera")
        ->with('success','carrera guardada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $camino=  CarrerasModel::find($id);
        $camino->delete();
        return redirect("/carrera")->with('success','Descanza en paz la carrera');
        
        
        //
    }

}
