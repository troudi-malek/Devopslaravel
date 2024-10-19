@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Modifier l'Événement</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('evenements.update', $evenement->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nom de l'Événement</label>
                    <input type="text" name="name" class="form-control" value="{{ $evenement->name }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ $evenement->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="event_date">Date de l'Événement</label>
                    <input type="date" name="event_date" class="form-control" value="{{ $evenement->event_date }}">
                </div>

                <button type="submit" class="btn btn-warning">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
