<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Empleado;


class EmpleadoController extends Controller
{
    public function index()
    {
        try {
            $arr = Empleado::all();
            return response()->json($arr, 200);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /*
    public function create()
    {
        return response()->json(['mensaje' => 'create'], 200);
    }
    */
    public function store(Request $request)
    {
        $arr = Empleado::create($request->all());
        try {
            return response()->json($arr->id, 201);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function show($id)
    {
        $arr = Empleado::find($id);
        return response()->json($arr, 200);
    }
    /*
    public function edit($id)
    {
        return response()->json(['mensaje' => 'edit'], 200);
    }
    */
    public function update(Request $request, $id)
    {
        $arr = Empleado::find($id);
        try {
            $result = $arr->update($request->all());
        } catch (Exception $e) {
            return response()->json(['data' => 'Data not updated'], 400);
        }
        
        return response()->json($result, 200);
    }
    
    public function destroy($id)
    {
        try{
            $result = Empleado::destroy($id);
            return response()->json([], 204);
        } catch(Exception $e) {
            echo $e->getMessage();
            return response()->json(['data not deleted'], 400);
        }
        
    }
  
}