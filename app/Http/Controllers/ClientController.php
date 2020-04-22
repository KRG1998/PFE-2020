<?php

namespace App\Http\Controllers;
use App\Client;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Client as ClientResource;
use Illuminate\Http\Request;
use App\Http\Resources\ClientCollection;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function index()
    {
        return new ClientCollection(Client::all());
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'address' => 'required|max:255',
            'gender' => 'required',
            'birthday' =>'required|before:2002-01-01',
            'phone'=>'required|min:8|numeric',
            'photo' => 'required',
        ]);
        if($request->get('photo'))
       {
          $photo = $request->get('photo');
          $name = time().'.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
          \Image::make($request->get('photo'))->save(public_path('storage\clients_photos/').$name);
        }
        $client = Client::create([
            
            'photo'=> $name,
            'user_id'=> $request->user_id,
            'description' => $request->description,
            'address' =>  $request->address,
            'gender' =>  $request->gender,
            'birthday' => $request->birthday,
            'phone' => $request-> phone,
        ]);

         
            return (new ClientResource($client))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        
    }
    public function show($id)
    {
        return new ClientResource(Client::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());

        return $client;
    }
}
