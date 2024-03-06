<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::all();
    
    return view('admin.events',compact('events'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }
    public function event_detail(Event $event){
        $event = Event::where('id', $event->id)->first(); 
        // dd($event->organizer);
        return view('client.event_detail', compact('event'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   
    public function update(EventRequest $request,Event $event)
    {
        $event->update(['approved' => true]);

        return back()->with('success', 'Event approved successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
