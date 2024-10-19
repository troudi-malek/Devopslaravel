<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    // Afficher la liste des destinations
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }
    public function create() {
        return view('destinations.create');
    }
    // Créer une nouvelle destination
    
    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'localisation' => 'required|string'
        ]);
    
        Destination::create($request->all());
        return redirect()->route('destinations.index')
                         ->with('success', 'Destination créé avec succès.');
    }
    // Afficher une destination par son ID
    public function show(Destination $destination) {
        return view('destinations.show', compact('destination'));
    }
    

    // Mettre à jour une destination

    public function edit(Destination $destination) {
        return view('destinations.edit', compact('destination'));
    }
    public function update(Request $request, Destination $destination) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'localisation' => 'required|string'
        ]);
    
        $destination->update($request->all());
        return redirect()->route('destinations.index')
                         ->with('success', 'Destination mis à jour avec succès.');
    }

    // Supprimer une destination
    public function destroy(Destination $destination) {
        $destination->delete();
        return redirect()->route('destinations.index')
                         ->with('success', 'Destination supprimé avec succès.');
    }
}
