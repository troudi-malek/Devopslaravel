@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Ajouter une Destination</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('destinations.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nom">Nom de la destination</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="localisation">Localisation</label>
                    <textarea name="localisation" class="form-control">{{ old('localisation') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection