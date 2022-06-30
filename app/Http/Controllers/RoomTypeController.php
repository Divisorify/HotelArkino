<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypesCards = RoomType::with('room')->orderBy('id')->limit(6)->get();
        $allRoomTypes = RoomType::with('room')->orderBy('id')->get();
        return view('roomtypes.index', ['roomtypesCards' => $roomtypesCards, 'roomtypes' => $allRoomTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|unique:roomtypes,type,'.$id,
            'persons' => 'required|numeric',
            'beds' => 'required|numeric',
            'description' => 'required|string|max:250',
            'price' => 'required|string',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomtype = RoomType::where('id', '=', $id)->with('room')->get()[0];

        if (!$roomtype) {
            return response()->json(['message' => 'This apartment does not exist!', 404]);
        }

        // 401 - unauthorized
        // 402 - created
        // 403 - no content
        // 404 - not found
        // 500 - bad request
        // 200 - OK
        // 201 - CREATED

        return view('roomtypes.show', ['roomtype' => $roomtype]);
    }

    public function edit(RoomType $roomtype)
    {
        $rooms = Room::all();
        return view('roomtypes.edit', ['roomtype' => $roomtype, 'rooms' => $rooms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'type' => 'required|unique:roomtypes,type,'.$id,
            'persons' => 'required|numeric',
            'beds' => 'required|numeric',
            'description' => 'required|string|max:250',
            'price' => 'required|string',
        ]);

        $roomId = Room::where('type', '=', $request->get('room'))->first(['id'])->id;

        RoomType::where('id', '=', $id)->update([
            'type'  => $request['type'],
            'persons'  => $request['persons'],
            'beds'  => $request['beds'],
            'description'  => $request['description'],
            'price'  => $request['price'],
            'room_id'  => $roomId
        ]);

        return redirect(route('roomtypes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
