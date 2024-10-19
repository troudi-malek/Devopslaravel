@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Modifier le Voyageur</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.voyageurs.update', $voyageur->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ $voyageur->nom }}">
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ $voyageur->prenom }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $voyageur->email }}">
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ $voyageur->telephone }}">
                </div>

                <button type="submit" class="btn btn-warning">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
