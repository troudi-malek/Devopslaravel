<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hebergement;

class HebergementController extends Controller
{
    public function index()
    {
        // Fetch all hebergements with associated transport
        $hebergements = Hebergement::with('transport')->get();

        // Convert to UTF-8 if needed
        foreach ($hebergements as $hebergement) {
            $hebergement->nom = mb_convert_encoding($hebergement->nom, 'UTF-8', 'auto');
            $hebergement->adresse = mb_convert_encoding($hebergement->adresse, 'UTF-8', 'auto');
            
            // Encode the image to base64 if it exists
            if ($hebergement->image) {
                $hebergement->image = base64_encode($hebergement->image);
            }
        }

        // Return the data as a JSON response with UTF-8 encoding
        return response()->json($hebergements)->header('Content-Type', 'application/json; charset=utf-8');
    }
}
