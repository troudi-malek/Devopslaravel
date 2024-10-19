<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Blog;

class EvenementController extends Controller
{
    public function index() {
        $evenements = Evenement::all();
        return view('evenements.index', compact('evenements'));
    }
    
    public function create() {
        return view('evenements.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'event_date' => 'required|date',
        ]);
    
        Evenement::create($request->all());
        return redirect()->route('evenements.index')
                         ->with('success', 'Événement créé avec succès.');
    }
    
    public function show(Evenement $evenement) {
        return view('evenements.show', compact('evenement'));
    }
    
    public function edit(Evenement $evenement) {
        return view('evenements.edit', compact('evenement'));
    }
    
    public function update(Request $request, Evenement $evenement) {
        $request->validate([
            'name' => 'required',
            'event_date' => 'required|date',
        ]);
    
        $evenement->update($request->all());
        return redirect()->route('evenements.index')
                         ->with('success', 'Événement mis à jour avec succès.');
    }
    
    public function destroy(Evenement $evenement) {
        $evenement->delete();
        return redirect()->route('evenements.index')
                         ->with('success', 'Événement supprimé avec succès.');
    }
    public function addBlogToEvenement(Request $request, $evenementId)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'author' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:blogs,slug',
        'cover_image' => 'nullable|string|max:255',
    ]);

    $evenement = Evenement::find($evenementId);
    if (!$evenement) {
        return response()->json(['message' => 'Evenement not found.'], 404);
    }
    $blog = new Blog();
    $blog->title = $request->input('title');
    $blog->content = $request->input('content');
    $blog->author = $request->input('author');
    $blog->slug = $request->input('slug');
    $blog->cover_image = $request->input('cover_image');
    $blog->evenement()->associate($evenement);
    $blog->save();
    return response()->json(['message' => 'Blog created successfully!', 'blog' => $blog], 201);
}
    
}
