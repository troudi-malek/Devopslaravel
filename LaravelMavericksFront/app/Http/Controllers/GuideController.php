<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;
use Ramsey\Uuid\Guid\Guid;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Guides= Guide::all();
        return view('GuideView.index',['Guides'=>$Guides]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('GuideView.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=>'required',
            'specialite'=>'required',
            'langue'=>'required',
            'contact'=>'required',
        ]);
        $newGuide=Guide::create($data);
        return redirect(route("guide.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guide $guide)
    {
        return view('GuideView.edit',['guide'=>$guide]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guide $guide)
    {
        $data=request()->validate([
            'nom'=>'required',
            'specialite'=>'required',
            'langue'=>'required',
            'contact'=>'required',
        ]);
        $guide->update($data);
        return redirect(route("guide.index"))->with('success','guide update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect(route("guide.index"))->with('success','guide deleted successfully');
    }
}
