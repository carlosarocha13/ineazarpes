<?php

namespace App\Http\Controllers;
use App\Models\Marina;

use Illuminate\Http\Request;

class MarinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marinas= Marina::all();
        return view('marinas.index', compact("marinas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marinas.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datos = Request::all();
        //dd($request);
     
        $validated = $request->validate([
            'nombre' => 'required',
            'siglas' => 'required',
            'rif' => 'required',
            'adm_portuario' => 'required',
            'estado' => 'required',
            'sector' => 'required',
            'municipio' => 'required',
            'direccion' => 'required',
            'coordenadas' => 'required',
            'descripcion' => 'required',
            'tipo_instalacion' => 'required',
            'maritima_fluvial_lacustre' => 'required',
            'especialidad' => 'required',
            'tipo_carga' => 'required',
            'segun_propiedad' => 'required',
            'segun_destinacion' => 'required',
            'segun_funcion' => 'required',
            'segun_interes' => 'required',
        ]);
        
        $marina = new Marina($request->input());
        $marina->save();
        return redirect()->route('marinas')->with('success','Marina deportiva creada con exito.');
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marina=Marina::find($id);
        return view('marinas.show',compact('marina'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marina $marina)
    {
        return view('marinas.edit',compact('marina'));
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
        $validated = $request->validate([
            'nombre' => 'required',
            'siglas' => 'required',
            'rif' => 'required',
            'adm_portuario' => 'required',
            'estado' => 'required',
            'sector' => 'required',
            'municipio' => 'required',
            'direccion' => 'required',
            'coordenadas' => 'required',
            'descripcion' => 'required',
            'tipo_instalacion' => 'required',
            'maritima_fluvial_lacustre' => 'required',
            'especialidad' => 'required',
            'tipo_carga' => 'required',
            'segun_propiedad' => 'required',
            'segun_destinacion' => 'required',
            'segun_funcion' => 'required',
            'segun_interes' => 'required',
        ]);
        $marina=Marina::findOrFail($id);
        $marina->nombre=$request->input('nombre');
        $marina->siglas=$request->input('siglas');
        $marina->rif=$request->input('rif');
        $marina->adm_portuario=$request->input('adm_portuario');
        $marina->estado=$request->input('estado');
        $marina->sector=$request->input('sector');
        $marina->municipio=$request->input('municipio');
        $marina->direccion=$request->input('direccion');
        $marina->coordenadas=$request->input('coordenadas');
        $marina->descripcion=$request->input('descripcion');
        $marina->tipo_instalacion=$request->input('tipo_instalacion');
        $marina->maritima_fluvial_lacustre=$request->input('maritima_fluvial_lacustre');
        $marina->especialidad=$request->input('especialidad');
        $marina->tipo_carga=$request->input('tipo_carga');
        $marina->segun_propiedad=$request->input('segun_propiedad');
        $marina->segun_destinacion=$request->input('segun_destinacion');
        $marina->segun_funcion=$request->input('segun_funcion');
        $marina->segun_interes=$request->input('segun_interes');
        

        $marina->save();
        return redirect()->route('marinas')->with('success','Información actualizada con exito.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marina=Marina::findOrFail($id);
        $marina->delete();
        return back()->with('success','El registro se ha eliminado con éxito.');
   
    }
}
