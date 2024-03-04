<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {      

        $clients=User::all()->where('user_type',1);
        $categories=Category::all();
        $categoriesNumber=Category::count();
        $clientsNumber = User::where('user_type', 1)->count();
        $organizersNumber = User::where('user_type', 2)->count();
        $organizers=User::all()->where('user_type',2);
        $clients=User::all()->where('user_type',2);

        // $doctor = Auth::user();

        return view('admin.index', compact('clients', 'categories', 'organizersNumber','clientsNumber','categoriesNumber','organizers'));

    }
    public function  getClients()
    {
        $clients=User::all()->where('user_type',1);
     $admin=Auth::user();

        return view('admin.clients', compact('clients','admin'));

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
