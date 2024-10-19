<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConseilVoyage;
use App\Models\Destination; // Ensure Destination model is imported

class ConseilVoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all conseils with their associated destinations
        $conseils = ConseilVoyage::with('destination')->get();
        return view('ConseilVoyageView.index', ['conseils' => $conseils]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Destinations = Destination::all();
        return view('ConseilVoyageView.create', ['destinations'=>$Destinations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the data including destination_id
        $data = $request->validate([
            'contenu' => 'required',
            'destination_id' => 'required|exists:destinations,id', // Ensure the destination exists
        ]);

        // Create the new ConseilVoyage
        ConseilVoyage::create($data);

        return redirect(route("conseil.index"))->with('success', 'Conseil created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ConseilVoyage $conseil)
    {
        // Eager load the destination relationship
        $conseil->load('destination');
        return view('ConseilVoyageView.show', ['conseils' => $conseil]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConseilVoyage $conseil)
    {

        $destinations = Destination::all();
        return view('ConseilVoyageView.edit', compact('conseil', 'destinations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConseilVoyage $conseil)
    {
        $data = $request->validate([
            'contenu' => 'required',
            'destination_id' => 'required|exists:destinations,id', 
        ]);
        $conseil->update($data);

        return redirect(route("conseil.index"))->with('success', 'Conseil updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConseilVoyage $conseil)
    {
        $conseil->delete();
        return redirect(route("conseil.index"))->with('success', 'Conseil deleted successfully');
    }
}
