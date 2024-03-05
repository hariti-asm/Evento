<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function ban(User $user)
    {
        $user->update(['banned' => true]);

        return back()->with('success', 'User banned successfully.');
    }

    public function unban(User $user)
    {
        $user->update(['banned' => false]);

        return back()->with('success', 'User unbanned successfully.');
    }
    public function index()
    {
        //
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
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'banned' => 'required|boolean',
        ]);
    
        // Toggle the banned status
        $user->update(['banned' => !$user->banned]);
    
        return back()->with('success', 'User status updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
