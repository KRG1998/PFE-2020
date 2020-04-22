<?php

namespace App\Http\Controllers;

use App\Offer;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Offer as OfferResource;
use Illuminate\Http\Request;
use App\Http\Resources\OfferCollection;
use Symfony\Component\HttpFoundation\Response;


class OfferController extends Controller
{
    public function index()
    {
        return new OfferCollection(Offer::all());
    }
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'duration' => 'required|integer|min:1',
            'cover_letter' => 'required',
            'amount'=>'required|integer|min:1'
        ]);

        $offer = Offer::create([
            'ad_id' => $request->ad_id,
            'client_id' => $request->client_id,
            'title' => $request->title,
            'duration' => $request->duration,
            'amount' => $request->amount,
            'cover_letter' => $request->cover_letter,
            'description' => $request->description,
            
        ]);


        return (new OfferResource($offer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
    public function show($id)
    {
        return new OfferResource(Offer::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update($request->all());

        return $offer;
    }
   
   
    public function delete($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return response()->json(null, 204);
    }
}
