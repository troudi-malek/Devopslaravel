@extends('layouts.app')

@section('content')
<div class="container">
    <div class="session-title">
        <h2>Activity Details</h2>
        <p>Details about the activity "{{ $activity->name }}"</p>
    </div>

    <div class="card">
        <img class="card-img-top" src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $activity->name }}</h5>
<p class="card-text">{{ $activity->description }}</p>
<p class="card-text">
    <small class="text-muted">Duration: {{ $activity->duration }} minutes</small>
</p>

            <div class="text-center">
                <a href="{{ route('admin.activities.edit', $activity->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.activities.destroy', $activity->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
