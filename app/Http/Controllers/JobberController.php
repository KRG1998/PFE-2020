<?php

namespace App\Http\Controllers;
use App\Jobber;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Jobber as JobberResource;
use Illuminate\Http\Request;
use App\Http\Resources\JobberCollection;
use Symfony\Component\HttpFoundation\Response;

class JobberController extends Controller
{
    public function index()
    {
        return new JobberCollection(Jobber::all());
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'address' => 'required|max:255',
            'gender' => 'required',
            'birthday' =>'required',
            'phone'=>'required|min:8|numeric',
            'photo' => 'required',
            'professional_status' =>'required'
        ]);
        if($request->get('photo'))
       {
          $photo = $request->get('photo');
          $name = time().'.' . explode('/', explode(':', substr($photo, 0, strpos($photo, ';')))[1])[1];
          \Image::make($request->get('photo'))->save(public_path('storage/jobbers_photos/').$name);
        }
        $jobber = Jobber::create([
            
            'photo'=> $name,
            'user_id'=> $request->user_id,
            'description' => $request->description,
            'address' =>  $request->address,
            'gender' =>  $request->gender,
            'birthday' => $request->birthday,
            'phone' => $request-> phone,
            'professional_status'=> $request->professional_status
        ]);

         
            return (new JobberResource($jobber))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        
    }
    public function show($id)
    {
        return new JobberResource(Jobber::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $jobber = Jobber::findOrFail($id);
        $jobber->update($request->all());

        return $jobber;
    }

}
