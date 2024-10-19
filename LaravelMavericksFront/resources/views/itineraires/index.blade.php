@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des Itinéraires</h1>
            <a href="{{ route('itineraires.create') }}" class="btn btn-primary mb-3">Ajouter un Itinéraire</a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Durée</th>
                        <th>Description</th>
                        <th>Destination</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itineraires as $itineraire)
                        <tr>
                            <td>{{ $itineraire->id }}</td>
                            <td>{{ $itineraire->titre }}</td>
                            <td>{{ $itineraire->duree }}</td>
                            <td>{{ $itineraire->description }}</td>
                            <td>{{ $itineraire->destination->nom }}</td>
                            <td>
                                <a href="{{ route('itineraires.show', $itineraire->id) }}" class="btn btn-info">Voir</a>
                                <a href="{{ route('itineraires.edit', $itineraire->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('itineraires.destroy', $itineraire->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet itinéraire ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
