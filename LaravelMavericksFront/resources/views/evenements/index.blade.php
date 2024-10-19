@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des Événements</h1>
            {{-- <a href="{{ route('evenements.create') }}" class="btn btn-primary mb-3">Ajouter un Événement</a> --}}
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
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evenements as $evenement)
                        <tr>
                            <td>{{ $evenement->id }}</td>
                            <td>{{ $evenement->name }}</td>
                            <td>{{ $evenement->event_date }}</td>
                            <td>
                                <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-info">Voir</a>
                                {{-- <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning">Modifier</a> --}}
                                {{-- <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
