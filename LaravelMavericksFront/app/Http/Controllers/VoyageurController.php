<?php

namespace App\Http\Controllers;

use App\Models\Voyageur;
use App\Models\Reservation;
use Illuminate\Http\Request;

class VoyageurController extends Controller
{
    public function index()
    {
        $voyageurs = Voyageur::with('reservations')->get();
        return view('admin.voyageurs.index', compact('voyageurs'));
    }
    

    public function create()
    {
        return view('admin.voyageurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:voyageurs,email',
            'telephone' => 'nullable|string|max:15',
        ]);

        Voyageur::create($request->all());
        return redirect()->route('admin.voyageurs.index')->with('success', 'Voyageur créé avec succès.');
    }

    public function show(Voyageur $voyageur)
    {
        return view('admin.voyageurs.show', compact('voyageur'));
    }

    public function edit(Voyageur $voyageur)
    {
        return view('admin.voyageurs.edit', compact('voyageur'));
    }

    public function update(Request $request, Voyageur $voyageur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:voyageurs,email,' . $voyageur->id,
            'telephone' => 'nullable|string|max:15',
        ]);

        $voyageur->update($request->all());
        return redirect()->route('admin.voyageurs.index')->with('success', 'Voyageur mis à jour avec succès.');
    }

    public function destroy(Voyageur $voyageur)
    {
        $voyageur->delete();
        return redirect()->route('admin.voyageurs.index')->with('success', 'Voyageur supprimé avec succès.');
    }
}
