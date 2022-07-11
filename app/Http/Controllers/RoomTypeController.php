<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypesCards = RoomType::with('room')->orderBy('id')->get();
        $roomtypes = RoomType::with('room')->orderBy('id')->get();
        return view('roomtypes.index', ['roomtypesCards' => $roomtypesCards, 'roomtypes' => $roomtypes]);
    }

    public function create()
    {
        return view('roomtypes.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomTypeRequest $request)
    {
        $request->validate([
            // 'type' => 'required|unique:roomtypes,type,'.$id,
            'type' => 'required|unique:roomtypes,type,',
            'persons' => 'required|numeric',
            'beds' => 'required|string|max:30',
            'description' => 'required|string|max:250',
            'price' => 'required|string',
            'room_id' => 'required|numeric',
        ]);
        
        // $roomId = Room::where('type', '=', $request->get('room'))->first(['id'])->id;

        RoomType::create(['type' => $request['type'], 'persons' => $request['persons'], 'beds' => $request['beds'], 'description' => $request['description'], 'price' => $request['price'], 'room_id' => $request['room_id']]);

        return redirect('/roomtypes');
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
