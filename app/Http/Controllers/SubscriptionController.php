<?php

namespace App\Http\Controllers;
use App\Subscription;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Subscription as SubscriptionResource;
use Illuminate\Http\Request;
use App\Http\Resources\SubscriptionCollection;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{
    public function index()
    {
        return new SubscriptionCollection(Subscription::all());
    }
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required' ,
        'type' =>  'required',
        'duration' => 'required' ,
         'price' => 'required' ,
         'description' =>'required'            
          
        ]);
       
        $subscription = Subscription::create([
            
        
            'user_id' => $request->user_id,
        'name' => $request->name,
        'type' => $request->type,
        'duration' => $request->duration,
         'price' => $request->price,
         'description' => $request->description
          
        ]);

         
            return (new SubscriptionResource($subscription))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        
    }
    public function show($id)
    {
        return new SubscriptionResource(Subscription::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
       $subscriptions  =Subscription::findOrFail($id);
       $subscriptions ->update($request->all());

        return $subscriptions ;
    }
    public function destroy($id)
    {
        $subscriptions =Subscription::find($id);
        $subscriptions->delete();

        return response()->json([
            'error' => false,
            'message'  => "The subcategory with the id $subscriptions->id has successfully been deleted.",
        ], 200);
    }
}
