@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des Réservations</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Utilisateur</th>
                        <th>Date de Réservation</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <!-- Vérifier si l'utilisateur est récupéré et afficher le nom et prénom -->
                            <td>
                                @if ($reservation->user) <!-- Si un utilisateur est trouvé -->
                                    {{ $reservation->user->name }}
                                @else
                                    Utilisateur non trouvé
                                @endif
                            </td>
                            <td>{{ $reservation->date_reservation }}</td>
                            <td>
                                @switch($reservation->statut)
                                    @case('en attente')
                                        <span class="badge badge-warning text-dark">{{ $reservation->statut }}</span>
                                        @break
                                    @case('confirmée')
                                        <span class="badge badge-success text-dark">{{ $reservation->statut }}</span>
                                        @break
                                    @case('annulée')
                                        <span class="badge badge-danger text-white">{{ $reservation->statut }}</span>
                                        @break
                                    @case('modifiée')
                                        <span class="badge badge-info text-dark">{{ $reservation->statut }}</span>
                                        @break
                                    @case('terminée')
                                        <span class="badge badge-secondary text-dark">{{ $reservation->statut }}</span>
                                        @break
                                    @default
                                        <span class="badge badge-dark text-white">{{ $reservation->statut }}</span>
                                @endswitch
                            </td>
                            <td>
                                @if ($reservation->statut == 'en attente')
                                    <form action="{{ route('admin.reservations.accepter', $reservation->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Accepter</button>
                                    </form>
                                    <form action="{{ route('admin.reservations.refuser', $reservation->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Refuser</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<style>
    .badge {
        color: white; /* Cela pourrait rendre le texte blanc */
    }

    .btn-success {
        background-color: white; /* Cela pourrait rendre le bouton blanc */
        color: black; /* Texte noir */
    }
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
