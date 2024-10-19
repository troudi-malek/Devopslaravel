<?php

namespace App\Http\Controllers;

use App\Models\Hebergement; // Import the Hebergement model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HebergementFrontController extends Controller
{
    public function index()
    {
        // Initialize hebergements as an empty array
        $hebergements = [];

        try {
            // Fetch all hebergements with associated transport directly from the database
            $hebergements = Hebergement::with('transport')->get();

            // Convert image base64 data to image tag format
            foreach ($hebergements as &$hebergement) {
                if (isset($hebergement->image)) {
                    $hebergement->image_tag = 'data:image/jpeg;base64,' . base64_encode($hebergement->image);
                }
            }

            // Log the fetched data for debugging (convert to array)
            Log::info('Fetched hebergements from the database:', $hebergements->toArray());
        } catch (\Exception $e) {
            // Log any exception that occurs
            Log::error('Error fetching hebergements: ' . $e->getMessage());
        }

        // Pass $hebergements to the view
        return view('hebergements.index', compact('hebergements'));
    }
}
