@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <h1>Ajouter un Équipement</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.equipements.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nom">Nom de l'Équipement</label>
                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" name="prix" class="form-control" value="{{ old('prix') }}">
                    </div>

                    <div class="form-group">
                        <label for="quantite_disponible">Quantité Disponible</label>
                        <input type="number" name="quantite_disponible" class="form-control" value="{{ old('quantite_disponible') }}">
                    </div>

                    <button type="submit" class="btn btn-success">Créer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
