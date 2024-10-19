@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des Destinations</h1>
            <a href="{{ route('destinations.create') }}" class="btn btn-primary mb-3">Ajouter une Destination</a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Localisation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destinations as $destination)
                        <tr>
                            <td>{{ $destination->id }}</td>
                            <td>{{ $destination->nom }}</td>
                            <td>{{ $destination->description }}</td>
                            <td>{{ $destination->localisation }}</td>
                            <td>
                                <a href="{{ route('destinations.show', $destination->id) }}" class="btn btn-info">Voir</a>
                                <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet destinations ?')">Supprimer</button>
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