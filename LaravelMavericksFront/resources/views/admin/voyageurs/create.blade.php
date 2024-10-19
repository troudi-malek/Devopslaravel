@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Ajouter un Voyageur</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.voyageurs.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
                </div>

                <button type="submit" class="btn btn-success">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
