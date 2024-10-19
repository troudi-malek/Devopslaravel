@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">All Blog Posts</h1>
            <a href="{{ route('evenements.blogs.create', $evenement->id) }}" class="btn btn-primary mb-4">Create New Blog</a>
        </div>
    </div>

    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card h-100" style="min-height: 400px;">
                    @if($blog->cover_image)
    <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" style="max-width: 100%; height: auto;">
@endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                        <a href="{{ route('evenements.blogs.show', ['evenement' => $evenement->id, 'blog' => $blog->slug]) }}"
                            class="btn btn-primary">Read More</a>
                    </div>
                    <div class="card-footer text-muted">
                        By {{ $blog->author }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
