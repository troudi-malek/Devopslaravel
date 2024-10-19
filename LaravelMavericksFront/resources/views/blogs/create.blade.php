@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create New Blog Post</h1>
            <form action="{{ route('evenements.blogs.store', $evenement->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Author -->
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required>
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Content -->
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="6" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Cover Image -->
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Cover Image</label>
                    <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                    @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
