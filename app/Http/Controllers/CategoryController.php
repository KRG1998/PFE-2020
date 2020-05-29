<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryCollection;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        return new CategoryCollection(Category::all());
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',          
            'photo' => 'required',

        ]);
        if($request->get('photo'))
       {
          $photo = $request->get('photo');
          $name = time().'.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
          \Image::make($request->get('photo'))->save(public_path('storage\categories_photos/').$name);
        }
        $category = Category::create([
            
            'photo'=> $name,
            'name'=> $request->name,
            'user_id'=>$request->user_id,
          
        ]);

         
            return (new CategoryResource($category))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        
    }
    public function show($id)
    {
        return new CategoryResource(Category::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return $category;
    }
    public function delete($id)
    {
        $categories = Category::find($id);
        $categories->delete();

        return response()->json([
            'error' => false,
            'message'  => "The category with the id $categories->id has successfully been deleted.",
        ], 200);
    }
}
