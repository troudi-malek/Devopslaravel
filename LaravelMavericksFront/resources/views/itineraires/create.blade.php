@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Ajouter un Itinéraire</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('itineraires.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="destination_id">Destination</label>
                    <select name="destination_id" class="form-control" required>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="titre">Titre de la parcours</label>
                    <input type="text" name="titre" class="form-control" value="{{ old('titre') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="duree">Durée (jours)</label>
                    <input type="number" name="duree" class="form-control" value="{{ old('duree') }}">
                </div>

                <button type="submit" class="btn btn-success">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection