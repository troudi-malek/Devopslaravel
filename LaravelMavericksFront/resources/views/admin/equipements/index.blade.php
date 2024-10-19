@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des Équipements</h1>
            <a href="{{ route('admin.equipements.create') }}" class="btn btn-primary mb-3">Ajouter un Équipement</a>

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
                        <th>Prix</th>
                        <th>Quantité Disponible</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipements as $equipement)
                        <tr>
                            <td>{{ $equipement->id }}</td>
                            <td>{{ $equipement->nom }}</td> <!-- Affichage du nom de l'équipement -->
                            <td>{{ $equipement->description ?? 'Pas de description' }}</td>
                            <td>{{ $equipement->prix }}</td>
                            <td>{{ $equipement->quantite_disponible }}</td> <!-- Affichage de la quantité disponible -->
                            <td>
                                <a href="{{ route('admin.equipements.edit', $equipement->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('admin.equipements.destroy', $equipement->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet équipement ?')">Supprimer</button>
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
