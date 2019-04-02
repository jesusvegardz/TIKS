<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Escuela;
use App\Nivel;
use Carbon\Carbon;
use DB;
class alumnosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function accion(Request $request){

        $escuela= new Escuela();
        $escuela->nombre_escuela= $request->input("nombre");
        $escuela->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('alumno.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $fecha = Carbon::now();
        $fecha = $fecha->format('y');
        $alumnos = DB::select('SELECT id from alumnos order by id desc limit 1');
        foreach($alumnos as $alumno){
            $matricula= $alumno->id;
            if($matricula >=10 && $matricula <=99){
                $matricula= "$fecha".'0'."$alumno->id";
            }elseif($matricula >=100){
                    $matricula= "$fecha"."$alumno->id";
                }
                else {
                    $matricula="$fecha".'00'."$alumno->id";
                }  
        }
        if(empty($matricula))
        $matricula=$fecha.'00'."1";
        $escuelas = Escuela::all();

        $niveles= DB::table('niveles')
        ->select('nivel')
        ->groupBy('nivel')
        ->get();  
        //return $matricula;
        return view('alumno.registro', compact('matricula', 'escuelas', 'niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        if($request->hasFile('foto')){
        $file= $request->file('foto');
        $foto= time().'-'.$file->getClientOriginalName();
        $file->move(public_path().'/perfil/', $foto);
        
      }else{
        $foto= "avatar.png";
      }

        $alumno= new Alumno();
        $alumno->matricula= request('matricula');
        $alumno->nombre= request('nombre');
        $alumno->edad= request('edad');
        $alumno->escuela= request('escuela');
        $alumno->nivel= request('nivel');
        $alumno->grado= request('grado');
        $alumno->familiar= request('familiar');
        $alumno->telefono= request('telefono');
        $alumno->foto= $foto;
        $alumno->descuento= request('descuento');
        $alumno->save();
        return redirect('/alumno');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $alumno= Alumno::findOrFail($id);

        return view('alumno.perfil')->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $alumno= Alumno::findOrFail($id);

        $escuelas = DB::table('escuelas')
         ->get();

        $nivel_list= DB::table('niveles')
        ->select('nivel')
        ->groupBy('nivel')
        ->get();
        return view('alumno.editar')->with('alumno', $alumno)
        ->with('escuelas', $escuelas)
        ->with('nivel_list', $nivel_list);
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

        $alumno= Alumno::findOrFail($id);

        if($request->hasFile('foto')){
        $file= $request->file('foto');
        $foto= time().'-'.$file->getClientOriginalName();
        $file->move(public_path().'/perfil/', $foto);
         
      }
        else{
            $foto= $alumno->foto;
        }
        $alumno->matricula= request('matricula');
        $alumno->nombre= request('nombre');
        $alumno->edad= request('edad');
        $alumno->escuela= request('escuela');
        $alumno->nivel= request('nivel');
        $alumno->grado= request('grado');
        $alumno->familiar= request('familiar');
        $alumno->telefono= request('telefono');
        $alumno->foto= $foto;
        $alumno->descuento= request('descuento');
        $alumno->save();
        return redirect('/alumno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
