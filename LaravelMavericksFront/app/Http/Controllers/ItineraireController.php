<?php
namespace App\Http\Controllers;

use App\Models\Itineraire;
use App\Models\Destination;
use Illuminate\Http\Request;

class ItineraireController extends Controller
{
    // Afficher la liste des itinéraires
    public function index()
    {
        $itineraires = Itineraire::with('destination')->get();
        return view('itineraires.index', compact('itineraires'));
    }

    // Afficher le formulaire pour créer un itinéraire
    public function create()
    {
        $destinations = Destination::all();
        return view('itineraires.create', compact('destinations'));
    }

    // Enregistrer un nouvel itinéraire
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'titre' => 'required|string|max:255',
            'duree' => 'required|integer',
            'description' => 'required|string'
        ]);

        Itineraire::create($request->all());

        return redirect()->route('itineraires.index')
                         ->with('success', 'Itinéraire créé avec succès.');
    }

    // Afficher un itinéraire par son ID
    public function show(Itineraire $itineraire)
    {
        return view('itineraires.show', compact('itineraire'));
    }

    // Afficher le formulaire pour modifier un itinéraire
    public function edit(Itineraire $itineraire)
    {
        $destinations = Destination::all();
        return view('itineraires.edit', compact('itineraire', 'destinations'));
    }

    // Mettre à jour un itinéraire
    public function update(Request $request, Itineraire $itineraire)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'titre' => 'required|string|max:255',
            'duree' => 'required|integer',
            'description' => 'required|string'
        ]);

        $itineraire->update($request->all());

        return redirect()->route('itineraires.index')
                         ->with('success', 'Itinéraire mis à jour avec succès.');
    }

    // Supprimer un itinéraire
    public function destroy(Itineraire $itineraire)
    {
        $itineraire->delete();

        return redirect()->route('itineraires.index')
                         ->with('success', 'Itinéraire supprimé avec succès.');
    }
}
