<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        // Pobranie danych z bazy danych
        $rooms = Room::all();
        // Zwrócenie widoku(przekazujemy dane ze zmiennej $countries)
        return view('rooms.index', ['rooms' => $rooms]);

        // if (!Gate::allows('find_room_access')) {
        //     return abort(401);
        // }
        $time_from = $request->input('time_from');
        $time_to = $request->input('time_to');


        if ($request->isMethod('POST')) {
              $rooms = Room::whereNotIn('id', function($query) use ($time_from, $time_to) {
            $query->from('reservations')
                ->select('room_id')
                ->where('time_from', '<=', $time_to)
                ->where('time_to', '>=', $time_from);
        })->get();
        } else {
            $rooms = null;
        }


        return view('rooms.index', compact('rooms', 'time_from', 'time_to'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        Room::create(['type' => $request['type'], 'persons' => $request['persons'], 'beds' => $request['beds'], 'area' => $request['area'], 'price' => $request['price']]);

        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.create_or_edit', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, $id)
    {

        $room = Room::where('id', '=', $id);

        $room->update([
            'type'  => $request['type'],
            'persons'  => $request['persons'],
            'beds'  => $request['beds'],
            'area'  => $request['area'],
            'price' => $request['price']
        ]);

        return redirect(route('rooms.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect(route('rooms.index'));
    }
}
