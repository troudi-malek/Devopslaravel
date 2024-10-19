@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Détails de l'itinéraire</h1>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $itineraire->titre }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Durée: </strong>{{ $itineraire->duree }} jours</p>
                    <p><strong>Description: </strong>{{ $itineraire->description ?? 'Pas de description' }}</p>
                    <p><strong>Destination: </strong>{{ $itineraire->destination->nom }}</p>
                </div>
            </div>

            <a href="{{ route('itineraires.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
