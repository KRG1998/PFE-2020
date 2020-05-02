<?php

namespace App\Http\Controllers;
use App\Ad;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Ad as AdResource;
use Illuminate\Http\Request;
use App\Http\Resources\AdCollection;
use Symfony\Component\HttpFoundation\Response;
class AdController extends Controller
{
    public function index()
    {
        return new AdCollection(Ad::all());
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' =>'required' , 
            'subcategory' =>'required',
            'description' =>'required' ,
            'jobbers_number' => 'required|integer|min:1',
            'phone'=>'required|min:8|numeric',
            'date' =>'required|date|after:now',
            'hour'  =>'required',
            'address' =>'required',
            'photos' =>'required',
            'duration' =>'required|integer|min:1',
            'hour_wage' =>'required|integer|min:1',
            'amount' =>'required',
        ]);
        if($request->get('photos'))
       {
          $photos = $request->get('photos');
          $name = time().'.' . explode('/', explode(':', substr($photos, 0, strpos($photos, ';')))[1])[1];
          \Image::make($request->get('photos'))->save(public_path('storage\ads_photos/').$name);
        }
        $ad = Ad::create([
            'photos'=> $name,
            'client_id' => $request->client_id,
            'title' =>$request->title,
            'category' =>$request->category, 
            'subcategory' =>$request->subcategory,
            'description' =>$request->description,
            'jobbers_number' =>$request->jobbers_number,
            'date' =>$request->date,
            'hour'  =>$request->hour,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'duration' =>$request->duration,
            'hour_wage' =>$request->hour_wage,
            'amount' =>$request->amount,
        ]);

         
            return (new AdResource($ad))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        
    }
    public function show($id)
    {
        return new AdResource(Ad::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update($request->all());

        return $ad;
    }
    public function delete($id)
    {
        $offers = Ad::find($id);
        $offers->delete();

        return response()->json([
            'error' => false,
<<<<<<< HEAD
            'message'  => "The offer with the id $offers->id has successfully been deleted.",
=======
            'message'  => "The Offer with the id $offers->id has successfully been deleted.",
>>>>>>> 598d9f99ef0334f50d5ad3ac48904aa95522d041
        ], 200);
    }
}
