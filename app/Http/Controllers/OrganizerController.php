<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EventRequest;
use App\Http\Requests\ReservationRequest;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $events = Event::leftJoin('reservations', 'events.id', '=', 'reservations.event_id')
                    ->select('events.*', DB::raw('COUNT(reservations.id) as reservations_count'))
                    ->where('reservations.validated', true)
                    ->groupBy('events.id')
                    ->get();


    return view("organizer.index", compact('events'));
}
    public function events()
    {    $events=Event::all();
        $categories=Category::all();
        return view("organizer.events",compact('events','categories'));
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

    
     public function store(EventRequest $request)
     { 
         $validatedData = $request->validated();
         
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = time() . '_' . $image->getClientOriginalName();
             $image->storeAs('public/images', $imageName);
             $validatedData['image'] = $imageName;
         }
         
         Event::create($validatedData);
     
         return back()->with('success', 'Event created successfully.');
     }
     

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
  
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow null or valid image file
        ]);
    
        // Find the event by ID
        $event = Event::findOrFail($id);
    
        // Update event properties with new data
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $event->image = $imageName;
        }
    
        $event->save();
    
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }
    public function reservation_type(Request $request, Event $event)
    { 
        // dd($event->reservation_type);
        $validatedData = $request->validate([
            'reservation_type' => 'required|in:manual,automatic',
        ]);
    
        $newReservationType = ($event->reservation_type === 'manual') ? 'automatic' : 'manual';
    
        $event->update(['reservation_type' => $newReservationType]);
    
        return back()->with('success', 'Reservation type updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
