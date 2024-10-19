<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    // Display a listing of ratings
    public function index()
    {
        $ratings = Rating::all();
        return view('admin.ratings.index', compact('ratings'));
    }

    // Show the form for creating a new rating
    public function create()
    {
        return view('admin.ratings.create');
    }

    // Store a newly created rating in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'voyageur_Id' => 'required|exists:users,id', // Assuming users are voyageurs
            'activity_Id' => 'required|exists:activities,id',
            'rating' => 'required|integer|min:1|max:5',
            'date' => 'required|date',
            'comment' => 'required|string',
        ]);

        Rating::create($validatedData);

        return redirect()->route('ratings.index')->with('success', 'Rating created successfully.');
    }

    // Display the specified rating
    public function show(Rating $rating)
    {
        return view('ratings.show', compact('rating'));
    }

    // Show the form for editing the specified rating
    public function edit(Rating $rating)
    {
        return view('ratings.edit', compact('rating'));
    }

    // Update the specified rating in storage
    public function update(Request $request, Rating $rating)
    {
        $validatedData = $request->validate([
            'voyageur_Id' => 'required|exists:users,id',
            'activity_Id' => 'required|exists:activities,id',
            'rating' => 'required|integer|min:1|max:5',
            'date' => 'required|date',
            'comment' => 'required|string',
        ]);

        $rating->update($validatedData);

        return redirect()->route('ratings.index')->with('success', 'Rating updated successfully.');
    }

    // Remove the specified rating from storage
    public function destroy(Rating $rating)
    {
        $rating->delete();

        return redirect()->route('ratings.index')->with('success', 'Rating deleted successfully.');
    }
}
