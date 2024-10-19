<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EventAd extends Controller
{
    public function index() {
        $evenements = Evenement::all();
        return view('admin.evenements.index', compact('evenements'));
    }
    
    public function create() {
        return view('admin.evenements.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'event_date' => 'required|date',
            'nbParticipant' => 'required|integer|between:20,200',
        ]);
    
        Evenement::create($request->all());
        return redirect()->route('admin.evenements.index')
                         ->with('success', 'Événement créé avec succès.');
    }
    
    public function show(Evenement $evenement) {
        return view('admin.evenements.show', compact('evenement'));
    }
    
    public function edit(Evenement $evenement) {
        return view('admin.evenements.edit', compact('evenement'));
    }
    
    public function update(Request $request, Evenement $evenement) {
        $request->validate([
            'name' => 'required',
            'event_date' => 'required|date',
            'nbParticipant' => 'required|integer|between:20,200',

        ]);
    
        $evenement->update($request->all());
        return redirect()->route('admin.evenements.index')
                         ->with('success', 'Événement mis à jour avec succès.');
    }
    
    public function destroy(Evenement $evenement) {
        $evenement->delete();
        return redirect()->route('admin.evenements.index')
                         ->with('success', 'Événement supprimé avec succès.');
    }
}
