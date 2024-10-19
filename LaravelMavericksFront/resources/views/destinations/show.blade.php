@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Détails de la destination</h1>

            <div class="card">
                <div class="card-header">
                    {{ $destination->nom }}
                </div>
                <div class="card-body">
                    <p><strong>Description: </strong>{{ $destination->description ?? 'Pas de description' }}</p>
                    <p><strong>Localisation: </strong>{{ $destination->localisation }}</p>
                </div>
            </div>

            <a href="{{ route('destinations.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection