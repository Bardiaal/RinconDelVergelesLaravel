<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Factura;
use App\Mesa;


class FacturaController extends Controller
{
    public function index()
    {
        try {
            $arr = Factura::all();
            return response()->json($arr, 200);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function getSpecificFacturas($id)
    {
        $arr = Factura::where('mesa', $id)->get();
        return response()->json($arr, 200);
    }
    
    public function getFacturasAbiertas($idEmpleado)
    {
        try {
            $arr = Factura::where('idEmpleadoFinal', $idEmpleado)->get();
            return response()->json($arr, 200);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function getFacturasCerradas($idEmpleado)
    {
        try {
            $arr = Factura::where('idEmpleadoFinal', '!=', $idEmpleado)->get();
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
        $arr = Factura::create($request->all());
        try {
            return response()->json($arr->id, 201);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function show($id)
    {
        $arr = Factura::find($id);
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
        $arr = Factura::find($id);
        try {
            $result = $arr->update($request->all());
        } catch (Exception $e) {
            return response()->json(['data' => 'Data not updated'], 400);
        }
        
        return response()->json($id, 200);
    }
    public function destroy($id)
    {
        $result = Factura::destroy($id);
        if($result === 1) {
            return response()->json($result, 200);
        }
        return response()->json(['data not deleted'], 400);
        
    }
  
}