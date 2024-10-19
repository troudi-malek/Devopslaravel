<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Rating;
use Illuminate\Support\Facades\Http;

class ActFrontController extends Controller
{
    // Display a listing of activities and return json
    public function index()
    {
        $activities = Activity::all();
        return response()->json($activities);
    }
    //display activityby Id
    public function show(Activity $activity)

    {
        return response()->json($activity);
    }

  //i want you to create a mthode that allow me to rate an activity and give her the rate as a number and a comment 
    public function rateActivity(Request $request, Activity $activity)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $rating = new Rating();
        $rating->activity_id = $activity->id;
        $rating->rating = $validatedData['rating'];
        $rating->comment = $validatedData['comment'];
        $rating->save();

        return response()->json($rating);
    }
}