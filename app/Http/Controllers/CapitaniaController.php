<?php

namespace App\Http\Controllers;
use App\Models\Capitania;

use Illuminate\Http\Request;

class CapitaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capitanias= Capitania::all();
        return view('capitanias.index', compact("capitanias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('capitanias.create');
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
            
        ]);
        
        ($capitania=new Capitania($request->input()))->saveOrFail();
    
         return redirect()->route('capitanias')->with('success','Capitania creada con exito.');
        
       
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
    public function edit(Capitania $capitania)
    {
        return view('capitanias.edit',compact('capitania'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nombre' => 'required',
        ]);
        $capitania=Capitania::findOrFail($id);
        $capitania->nombre=$request->input('nombre');
        $capitania->save();
        return redirect()->route('capitanias')->with('success','Información actualizada con exito.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capitania=Capitania::findOrFail($id);
        $capitania->delete();
        return back()->with('success','El registro se ha eliminado con éxito.');
    }
}
