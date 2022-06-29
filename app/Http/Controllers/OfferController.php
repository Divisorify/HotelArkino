<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('offers.index');
        $offers = Offer::all();
        return view('offers.index',['offers' => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'roomtype' => 'required|string|max:15',
            'residents' => 'required|integer',
            'check_in' => 'required|date|max:12',
            'check_out' => 'required|date|max:12',
            'comment' => 'required|string|max:500'
        ]);
        
        Offer::create(['email' => $request['email'], 'roomtype' => $request['roomtype'], 'residents' => $request['residents'], 'check_in' => $request['check_in'], 'check_out' => $request['check_out'], 'comment' => $request['comment']]);

        return redirect('/roomtypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return view('offers.show', ['offer' => $offer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //$offers = Offer::all();
        return view('offers.create_or_edit', ['offer' => $offer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, $id)
    {
        $offer = Offer::where('id', '=', $id);
        
        $request->validate([
            'email' => 'required|email',
            'roomtype' => 'required|string|max:15',
            'residents' => 'required|integer',
            'check_in' => 'required|date|max:12',
            'check_out' => 'required|date|max:12',
            'comment' => 'required|string|max:500'
        ]);

        $offer->update([
            'email' => 'required|email',
            'roomtype' => 'required|string',
            'residents' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'comment' => 'required|string'
        ]);

        return redirect(route('offers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect(route('offers.index'));
    }
}
