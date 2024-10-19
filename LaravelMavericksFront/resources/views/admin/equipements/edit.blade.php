@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Modifier l'Équipement</h1>

            @if ($errors->any())        
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.equipements.update', $equipement->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom de l'Équipement</label>
                    <!-- Changer name en nom pour correspondre à la colonne de la base de données -->
                    <input type="text" name="nom" class="form-control" value="{{ $equipement->nom }}">
                </div>
                <div class="form-group">
    <label for="prix">Prix</label>
    <input type="text" name="prix" class="form-control" value="{{ $equipement->prix }}">
</div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <!-- La colonne description semble correcte -->
                    <textarea name="description" class="form-control">{{ $equipement->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="quantite_disponible">Quantité</label>
                    <!-- Changer quantity en quantite_disponible pour correspondre à la colonne de la base de données -->
                    <input type="number" name="quantite_disponible" class="form-control" value="{{ $equipement->quantite_disponible }}">
                </div>

                <button type="submit" class="btn btn-warning">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
