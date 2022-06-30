<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservations;
use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // where('email','=',$email)->first()
        $reservations = Reservations::all();
        return view('reservations.index',['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationsRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'room_id' => 'required|int',
            'check_in' => 'required|date|max:12',
            'check_out' => 'required|date|max:12',
        ]);
        
        Reservations::create(['email' => $request['email'], 'room_id' => $request['room_id'], 'check_in' => $request['check_in'], 'check_out' => $request['check_out']]);

        return redirect('/reservations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function show(Reservations $reservation)
    {
        return view('reservations.show', ['reservation' => $reservation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservations $reservation)
    {
        $room = Room::all();
        return view('reservations.create_or_edit', ['reservation' => $reservation, 'room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationsRequest  $request
     * @param  \App\Models\Reservations  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationsRequest $request, $id)
    {
        $reservation = Reservations::where('id', '=', $id);

        $request->validate([
            'email' => 'required|email',
            'room_id' => 'required|int',
            'check_in' => 'required|date|max:12',
            'check_out' => 'required|date|max:12',
        ]);
        
        $reservation->update([
            'email'  => $request['email'],
            'room_id'  => $request['room_id'],
            'check_in'  => $request['check_in'],
            'check_out'  => $request['check_out']
        ]);

        return redirect(route('reservations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservations  $reservations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservations $reservation)
    {
        $reservation->delete();
        return redirect(route('reservations.index'));
    }
}
