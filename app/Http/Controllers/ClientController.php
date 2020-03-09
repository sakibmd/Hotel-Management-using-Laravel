<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index', 
            //['clients'=> Client::all()->where('status', '=', '0')
			['clients'=> Client::where('status', '=', '0')->orderBy('updated_at', 'desc')->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create', 
            ['rooms'=> Room::all()->where('status', '=', '0')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $validatedData = $request->validate([
                'name' => 'required|min:3',
                'address' => 'required',
                'phone' => 'required',
                'room_no' => 'required',
                'price' => 'required',
            ]);
            $c = Client::create($validatedData);

            $room = $c->room_no; 
			
			$UpdateDetails = Room::where('room_no', '=',  $room)->first();
			$UpdateDetails->status = 1;
			$UpdateDetails->save();
			
            // $room_no = Room::find($room);
            // if (empty($room_no)){
               // $room_no= new Room;
            // }
            // $room_no->status = 1;
            // $room_no->save();


            $request->session()->flash('status', 'New Client added successfully!');
            return redirect()->route('currentClients.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
