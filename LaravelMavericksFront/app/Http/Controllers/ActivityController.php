<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Activity;
use App\Models\Rating;

class ActivityController extends Controller
{
    public function index()
    {
        // Fetch activities from the back-end API
        $response = Http::get('http://localhost:8000/api/activityApi');

        // Check if the response is successful
        if ($response->successful()) {
            $activities = $response->json();

            // Ensure $activities is an array before iterating
            if (is_array($activities)) {
                // Convert binary image data to Base64 encoded string
                foreach ($activities as &$activity) {
                    if (isset($activity['image'])) {
                        // Encode the binary data to Base64
                        $activity['image_tag'] = 'data:image/jpeg;base64,' . base64_encode($activity['image']);
                    } else {
                        $activity['image_tag'] = ''; // Handle case where image is not available
                    }
                }
            } else {
                $activities = []; // Handle unexpected data format gracefully
            }
        } else {
            $activities = []; // Handle error gracefully by returning an empty array
        }

        return view('activities.index', compact('activities'));
    }

    public function show($id)
    {
        // Fetch a single activity from the back-end API
        $response = Http::get("http://localhost:8000/api/activityApi/{$id}");
    
        // Check if the response is successful
        if ($response->successful()) {
            // Decode the response to an array
            $activity = json_decode($response->body(), true); // true will decode as an array
        } else {
            $activity = null; // Handle error gracefully
        }
    
        return view('activities.show', compact('activity'));
    }
    
   //methode to consume rating api
   public function storeRating(Request $request, $activity_id)
    {
        // Validate incoming request
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        // Fetch the activity by ID
        $activity = Activity::findOrFail($activity_id);

        // Create a new rating instance
        $rating = new Rating();
        $rating->activity_id = $activity->id;
        $rating->rating = $validated['rating'];
        $rating->comment = $validated['comment'];
        $rating->save();

        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }
    //methode to consume this methode that get all the rating from the backend 
    public function getRatings($activity_id)
{
    // Make an HTTP GET request to the back-end API for the rating
    $response = Http::get("http://localhost:8000/api/getRating/{$activity_id}");

    // Check if the response is successful
    if ($response->successful()) {
        $ratings = $response->json();
        $averageRating = $ratings['moyenne'] ?? 0; // Get the average rating
    } else {
        $averageRating = null; // Handle error gracefully
    }

    return view('activities.show', compact('averageRating'));
}

}