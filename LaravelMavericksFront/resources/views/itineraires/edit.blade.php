@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Modifier l'itinéraire</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('itineraires.update', $itineraire->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="destination_id">Destination</label>
                    <select name="destination_id" class="form-control" required>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}" {{ $itineraire->destination_id == $destination->id ? 'selected' : '' }}>
                                {{ $destination->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" class="form-control" value="{{ $itineraire->titre }}" required>
                </div>
                <div class="form-group">
                    <label for="duree">Durée (jours)</label>
                    <input type="number" name="duree" class="form-control" value="{{ $itineraire->duree }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required>{{ $itineraire->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection