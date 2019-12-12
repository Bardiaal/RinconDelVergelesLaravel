<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Categoria;


class CategoriaController extends Controller
{
    public function index()
    {
        try {
            $arr = Categoria::all();
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
        $arr = Categoria::create($request->all());
        try {
            return response()->json($arr->id, 201);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function show($id)
    {
        $arr = Categoria::find($id);
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
        $arr = Categoria::find($id);
        try {
            $result = $arr->update($request->all());
        } catch (Exception $e) {
            return response()->json(['data' => 'Data not updated'], 400);
        }
        
        return response()->json($result, 200);
    }
    public function destroy($id)
    {
        $result = Categoria::destroy($id);
        if($result === 1) {
            return response()->json([], 204);
        }
        return response()->json(['data not deleted'], 400);
        
    }
  
}
