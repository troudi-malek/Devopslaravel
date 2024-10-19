<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    // Show a list of reservations
    public function index()
    {
        $reservations = Reservation::with('user')->get();
        
    
        return view('admin.reservations.index', compact('reservations'));
    }
    

    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'destination' => 'required|string',
                'date_reservation' => 'required|date',
                'statut' => 'required|string',
                'user_id' => 'required|integer',  // Make sure voyageur_id is passed
            ]);
    
            Log::info('Request Data: ', $request->all());  // Log incoming request data
    
            // Create a new reservation
            $reservation = Reservation::create([
                'user_id' => auth()->id(),  // Utilisation de l'ID de l'utilisateur connecté
                'destination' => $request->destination,
                'date_reservation' => $request->date_reservation,
                'statut' => $request->statut,
            ]);
    
            Log::info('Reservation Created: ', ['reservation' => $reservation]);  // Log created reservation data
    
            return response()->json([
                'success' => true,  // Return success status
                'reservation' => $reservation
            ], 200);
        } catch (\Exception $e) {
            Log::error('Reservation creation failed: ' . $e->getMessage());  // Log any exceptions
    
            return response()->json([
                'success' => false,
                'error' => 'Erreur lors de la réservation. Veuillez réessayer.'
            ], 500);
        }
    }

    // Accept the reservation
    public function accepter($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->statut = 'confirmée';
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'La réservation a été acceptée.');
    }

    // Reject the reservation
    public function refuser($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->statut = 'annulée';
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'La réservation a été refusée.');
    }
}
