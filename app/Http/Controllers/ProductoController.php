<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Producto;


class ProductoController extends Controller
{
    public function index()
    {
        try {
            $arr = Producto::all();
            return response()->json($arr, 200);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function getSpecificProductos($id) {
        $arr = Producto::where('categoria', $id)->get();
        return response()->json($arr, 200);
    }
     
    public function getProductosName($ids) {
        
        try {
            $pdo = DB::connection()->getPdo();
            $prods = explode(':', $ids);
            $sql = "SELECT * FROM producto WHERE id = $prods[0] ";
            foreach($prods as $id) {
                $sql .= "or id = $id ";
            }
            $result = $pdo->query($sql);
            $arr = $result->fetchAll();
            return response()->json($arr, 200);
        } catch(Exception $e) {
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
        $arr = Producto::create($request->all());
        try {
            return response()->json($arr->id, 201);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function show($id)
    {
        $arr = Producto::find($id);
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
        $arr = Producto::find($id);
        try {
            $result = $arr->update($request->all());
        } catch (Exception $e) {
            return response()->json(['data' => 'Data not updated'], 400);
        }
        
        return response()->json($result, 200);
    }
    public function destroy($id)
    {
        $result = Producto::destroy($id);
        if($result === 1) {
            return response()->json($result, 200);
        }
        return response()->json(['data not deleted'], 400);
        
    }
  
}