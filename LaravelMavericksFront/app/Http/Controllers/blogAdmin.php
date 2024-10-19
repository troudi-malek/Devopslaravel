<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Evenement;
use Illuminate\Http\Request;

class blogAdmin extends Controller
{
    // Inject Evenement model using route model binding
    public function index(Evenement $evenement)
    {
        $blogs = $evenement->blogs; // Get blogs associated with the evenement
        return view('admin.blogs.index', compact('blogs', 'evenement'));
    }

    public function create(Evenement $evenement)
    {
        return view('admin.blogs.create', compact('evenement'));
    }

    public function store(Request $request, Evenement $evenement)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required',
            'slug' => 'required|unique:blogs,slug',
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $filePath = $request->file('cover_image')->store('cover_images', 'public');
            $validated['cover_image'] = $filePath; // Save the file path in the validated data
        }

        // Create a blog associated with the evenement
        $blog = $evenement->blogs()->create($validated);

        return redirect()->route('admin.evenements.blogs.index', $evenement->id)->with('success', 'Blog post created successfully!');
    }

    public function show(Evenement $evenement, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('admin.blogs.show', compact('blog', 'evenement'));
    }
    

    public function edit(Evenement $evenement, Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Evenement $evenement, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $blog->id,
            'cover_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Update the blog post
        $blog->update($validated);
        return redirect()->route('admin.evenements.blogs.index', $evenement->id)->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Evenement $evenement, Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.evenements.blogs.index', $evenement->id)->with('success', 'Blog post deleted successfully!');
    }
}
