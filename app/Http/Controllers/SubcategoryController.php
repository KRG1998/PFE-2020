<?php

namespace App\Http\Controllers;
use App\subcategory;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\subcategory as subcategoryResource;
use Illuminate\Http\Request;
use App\Http\Resources\subcategoryCollection;
use Symfony\Component\HttpFoundation\Response;

class subcategoryController extends Controller
{
    public function index()
    {
        return new subcategoryCollection(subcategory::all());
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',          
          
        ]);
       
        $subcategory = subcategory::create([
            
        
            'name'=> $request->name,
            'category_id' => $request -> category_id,
            'user_id'=>$request->user_id,
          
        ]);

         
            return (new SubcategoryResource($subcategory))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        
    }
    public function show($id)
    {
        return new SubcategoryResource(Subcategory::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());

        return $subcategory;
    }
    public function delete($id)
    {
        $subcategories =Subcategory::find($id);
        $subcategories->delete();

        return response()->json([
            'error' => false,
            'message'  => "The subcategory with the id $subcategories->id has successfully been deleted.",
        ], 200);
    }
}
