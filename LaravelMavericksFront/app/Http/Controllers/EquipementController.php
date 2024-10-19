<?php


namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    // Méthode pour afficher tous les équipements
    public function index()
    {
        $equipements = Equipement::all(); // Récupère tous les équipements
        return view('admin.equipements.index', compact('equipements'));
    }

    // Méthode pour afficher un formulaire de création
    public function create()
    {
        return view('admin.equipements.create');
    }

    // Méthode pour stocker un nouvel équipement
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'quantite_disponible' => 'required|integer',
        ]);

        Equipement::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite_disponible' => $request->quantite_disponible,
        ]);

        return redirect()->route('admin.equipements.index')->with('success', 'Équipement créé avec succès');
    }

    // Méthode pour afficher un formulaire d'édition
    public function edit($id)
    {
        $equipement = Equipement::findOrFail($id);
        return view('admin.equipements.edit', compact('equipement'));
    }

    // Méthode pour mettre à jour un équipement existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'quantite_disponible' => 'required|integer',
        ]);

        $equipement = Equipement::findOrFail($id);

        $equipement->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite_disponible' => $request->quantite_disponible,
        ]);

        return redirect()->route('admin.equipements.index')->with('success', 'Équipement mis à jour avec succès');
    }

    // Méthode pour supprimer un équipement
    public function destroy($id)
    {
        $equipement = Equipement::findOrFail($id);
        $equipement->delete();

        return redirect()->route('admin.equipements.index')->with('success', 'Équipement supprimé avec succès');
    }
}
