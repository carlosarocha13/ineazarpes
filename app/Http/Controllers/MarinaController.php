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
            'segun_pripiedad' => 'required',
            'segun_destinacion' => 'required',
            'segun_funcion' => 'required',
            'segun_interes' => 'required',

            
        ]);
        
        ($marina=new Marina($request->input()))->saveOrFail();
    
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
        //
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
        //
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
