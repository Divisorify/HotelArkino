<?php

namespace App\Http\Controllers;

use App\Models\Spa;
use App\Http\Requests\StoreSpaRequest;
use App\Http\Requests\UpdateSpaRequest;

class SpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spa  $spa
     * @return \Illuminate\Http\Response
     */
    public function show(Spa $spa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spa  $spa
     * @return \Illuminate\Http\Response
     */
    public function edit(Spa $spa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpaRequest  $request
     * @param  \App\Models\Spa  $spa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpaRequest $request, Spa $spa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spa  $spa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spa $spa)
    {
        //
    }
}
