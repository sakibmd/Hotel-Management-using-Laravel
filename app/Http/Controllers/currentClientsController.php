<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Client;
use Illuminate\Support\Facades\DB;

class currentClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('currentClients.index', 
        ['clients'=> Client::all()->where('status', '=', '1')]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        //for exit
        $c = Client::find($id);
        if (empty($c)) {
           $c= new Client;
        }
        $c->status = 0;
        $c->save();


         $room = $c->room_no;
         $room = Room::find($room);
         if (empty($room)){
            $room= new Room;
         }
         $room->status = 0;
         $room->save();


         
         $request->session()->flash('status', 'Record added successfully!');
         return redirect()->route('clients.index');
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
