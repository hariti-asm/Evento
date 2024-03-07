<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    $events=Event::all();
        $categories=Category::all();
        return view("organizer.index",compact('events','categories'));
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
     
         return redirect()->route('events.index')->with('success', 'Event created successfully.');
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
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
