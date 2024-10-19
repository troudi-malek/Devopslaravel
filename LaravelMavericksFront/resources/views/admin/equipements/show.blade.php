@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Détails de l'Équipement</h1>

            <div class="card">
                <div class="card-header">
                    {{ $equipement->name }}
                </div>
                <div class="card-body">
                    <p><strong>Description: </strong>{{ $equipement->description ?? 'Pas de description' }}</p>
                    <p><strong>Quantité: </strong>{{ $equipement->quantity }}</p>
                </div>
            </div>

            <a href="{{ route('equipements.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
