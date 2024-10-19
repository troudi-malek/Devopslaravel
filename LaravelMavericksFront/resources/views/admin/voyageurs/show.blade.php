@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Détails du Voyageur</h1>

            <div class="card">
                <div class="card-header">
                    {{ $voyageur->nom }} {{ $voyageur->prenom }}
                </div>
                <div class="card-body">
                    <p><strong>Email : </strong>{{ $voyageur->email }}</p>
                    <p><strong>Téléphone : </strong>{{ $voyageur->telephone ?? 'Pas de téléphone' }}</p>
                    <p><strong>Réservations : </strong></p>
                    @if ($voyageur->reservations->isEmpty())
                        <p>Pas de réservations associées.</p>
                    @else
                        <ul>
                            @foreach ($voyageur->reservations as $reservation)
                                <li>Réservation n°{{ $reservation->id }} - {{ $reservation->date_reservation }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <a href="{{ route('admin.voyageurs.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
