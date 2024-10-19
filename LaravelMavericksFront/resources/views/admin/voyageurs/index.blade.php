@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des Voyageurs</h1>
            <a href="{{ route('admin.voyageurs.create') }}" class="btn btn-primary mb-3">Ajouter un Voyageur</a>
            
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
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voyageurs as $voyageur)
                        <tr>
                            <td>{{ $voyageur->id }}</td>
                            <td>{{ $voyageur->nom }}</td>
                            <td>{{ $voyageur->prenom }}</td>
                            <td>{{ $voyageur->email }}</td>
                            <td>{{ $voyageur->telephone }}</td>
                            <td>
                                <a href="{{ route('admin.voyageurs.show', $voyageur->id) }}" class="btn btn-info">Voir</a>
                                <a href="{{ route('voyageurs.edit', $voyageur->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('admin.voyageurs.destroy', $voyageur->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce voyageur ?')">Supprimer</button>
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
