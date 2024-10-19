<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hebergement;
use Illuminate\Http\Request;
use App\Models\Transport;   
use App\Http\Controllers\Controller;

class HebergementController extends Controller
{
    public function index()
    {
        // Fetch all hebergements from the database with their associated transports
        $hebergements = Hebergement::with('transport')->get();
    
        // Convert each BLOB image to base64 format if it exists
        foreach ($hebergements as $hebergement) {
            if ($hebergement->image) {
                // Base64 encode the binary image data for display
                $hebergement->image = base64_encode($hebergement->image);
            }
        }
    
        // Fetch all transports
        $transports = Transport::all(); 
    
        // Pass both hebergements and transports data to the index view
        return view('admin.hebergements.index', compact('hebergements', 'transports'));
    }
    

    public function create()
    {
        // Fetch all transports from the database
        $transports = Transport::all();

        // Pass the transports data to the view
        return view('admin.hebergements.create', compact('transports'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'transport_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5 MB
        ]);
    
        // Attempt to store the image as BLOB in the database
        try {
            $hebergement = new Hebergement();
            $hebergement->nom = $request->nom;
            $hebergement->adresse = $request->adresse;
            $hebergement->transport_id = $request->transport_id;
    
            if ($request->hasFile('image')) {
                // Check if the file is valid
                if ($request->file('image')->isValid()) {
                    // Convert image file to binary (BLOB)
                    $hebergement->image = file_get_contents($request->file('image')->getRealPath());
                } else {
                    return back()->withErrors(['image' => 'Uploaded file is not valid.']);
                }
            } else {
                return back()->withErrors(['image' => 'Image is required.']);
            }
    
            // Save the Hebergement
            $hebergement->save();
    
            return redirect()->route('admin.hebergements.index')->with('success', 'Hébergement ajouté avec succès');
        } catch (\Exception $e) {
            // Log the error message for debugging
            \Log::error('Failed to save Hébergement: ' . $e->getMessage());
    
            return back()->withErrors(['error' => 'Failed to save Hébergement.']);
        }
    }
    

    public function edit(Hebergement $hebergement)
    {
        // Fetch all transports from the database
        $transports = Transport::all();
        
        // Pass the hebergement and transports data to the view
        return view('admin.hebergements.edit', compact('hebergement', 'transports'));
    }

    public function update(Request $request, Hebergement $hebergement)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'transport_id' => 'required|integer',
            'image' => 'nullable|image|max:5120' // Image can be optional
        ]);

        // If a new image is uploaded, update it
        if ($request->hasFile('image')) {
            // Convert the new image to binary (BLOB)
            $hebergement->image = file_get_contents($request->file('image')->getRealPath());
        }

        // Update the hebergement data
        $hebergement->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'transport_id' => $request->transport_id,
            // Only update the image if it's uploaded
            'image' => isset($hebergement->image) ? $hebergement->image : null,
        ]);

        return redirect()->route('admin.hebergements.index')->with('success', 'Hébergement mis à jour avec succès.');
    }

    public function destroy(Hebergement $hebergement)
    {
        try {
            $hebergement->delete();
            return redirect()->route('admin.hebergements.index')->with('success', 'Hébergement supprimé avec succès');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete Hébergement.']);
        }
    }
    
}
