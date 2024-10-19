@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Détails de l'Événement</h1>

            <div class="card">
                <div class="card-header">
                    {{ $evenement->name }}
                </div>
                <div class="card-body">
                    <p><strong>Description: </strong>{{ $evenement->description ?? 'Pas de description' }}</p>
                    <p><strong>Date: </strong>{{ $evenement->event_date }}</p>
                </div>
            </div>

            <a href="{{ route('evenements.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
            <a href="{{ route('evenements.blogs.index', $evenement->id) }}" class="btn btn-primary mt-3">Blog List</a>
        </div>
    </div>
</div>
@endsection
