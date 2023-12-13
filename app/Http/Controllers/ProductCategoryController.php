<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $queryData = ProductCategory::all();
            $formattedDatas = new ProductCategoryController($queryData);
            return response()->json([
                "message" => "succes",
                "data" =>$formattedDatas
            ], 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedRequest = $request->validated();
        try{
            $queryData = ProductCategory::create($validatedRequest);
            $formattedDatas = new ProductCategoryController($queryData);
            return response()->json([
                "message" => "succes",
                "data" =>$formattedDatas
            ], 200);
        } catch (Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $queryData = ProductCategory::findorFail($id);
            $formattedDatas = new ProductCategoryController($queryData);
            return response()-> json([
                "message" => "succes",
                "data" =>$formattedDatas
            ], 200);
        }catch (Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedRequest = $request->validated();
        try{
            $queryData = ProductCategory::findorFail($id);
            $queryData->update($validatedRequest);
            $queryData->save();
            $formattedDatas = new ProductCategoryController($queryData);
            return response()->json([
                "message" => "succes",
                "data" =>$formattedDatas
            ], 200);
        } catch (Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $queryData = ProductCategory::findorFail($id);
            $queryData->delete();
            $queryData = new ProductCategoryController($queryData);
            return response()->json([
                "message" => "succes",
                "data" =>$formattedDatas
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
