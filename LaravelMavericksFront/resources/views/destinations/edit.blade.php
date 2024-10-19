@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Modifier Destination</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('destinations.update', $destination->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom de la destination</label>
                    <input type="text" name="nom" class="form-control" value="{{ $destination->nom }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ $destination->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="localisation">Localisation</label>
                    <input type="text" name="localisation" class="form-control" value="{{ $destination->localisation }}">
                </div>

                <button type="submit" class="btn btn-warning">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection