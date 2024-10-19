@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">{{ $blog->title }}</h1>
            <div class="mb-4">
                <img src="{{ asset('storage/' . $blog->cover_image) }}" class="img-fluid rounded" alt="{{ $blog->title }}" onerror="this.src='{{ asset('images/default-cover.jpg') }}';">
            </div>
            <p class="text-muted">By {{ $blog->author }} on {{ $blog->created_at->format('F j, Y') }}</p>
            <div class="blog-content mb-4">
                {{ $blog->content }}
            </div>
            <a href="{{ route('evenements.blogs.index', $evenement->id) }}" class="btn btn-secondary mb-4">Back to Blog List</a>
        </div>
    </div>
@endsection
