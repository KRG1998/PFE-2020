<?php

namespace App\Http\Controllers;
use App\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Admin as AdminResource;
use Illuminate\Http\Request;
use App\Http\Resources\AdminCollection;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function index()
    {
        return new AdminCollection(Admin::all());
    }
    public function store(Request $request)
    {
        $request->validate([
            
            'gender' => 'required',
            'birthday' =>'required|before:2002-01-01',
            'photo' => 'required',
        ]);
        if($request->get('photo'))
       {
          $photo = $request->get('photo');
          $name = time().'.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
          \Image::make($request->get('photo'))->save(public_path('storage\admins_photos/').$name);
        }
        $admin = Admin::create([
            
            'photo'=> $name,
            'user_id'=> $request->user_id,
            'gender' =>  $request->gender,
            'birthday' => $request->birthday,
        ]);

         
            return (new AdminResource($admin))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        
    }
    public function show($id)
    {
        return new AdminResource(Admin::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->all());

        return $admin;
    }
}
