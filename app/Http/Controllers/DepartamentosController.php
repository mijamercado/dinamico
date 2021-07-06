<?php

namespace App\Http\Controllers;

use App\Departamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Provincias;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Departamentos $departamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamentos $departamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamentos $departamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamentos $departamentos)
    {
        //
    }
    public function seleccion(){
        $departamentos=DB::table('departamentos')->get();
        $provincia=DB::table('provincias')->get();
        return view('selector',compact('departamentos'));
    }
    public function provincias(Request $request){
        if(isset($request->texto)){
            //
            $subcategorias = Provincias::where('idDepartamento',$request->texto)->get();
            return response()->json(
                [
                    'lista' => $subcategorias,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }

}