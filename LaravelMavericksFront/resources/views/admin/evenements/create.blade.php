@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
            <h1>Ajouter un Événement</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('evenements.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nom de l'Événement</label>
                    <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="event_date">Date de l'Événement</label>
                    <input type="date" name="event_date" class="form-control" value="{{ old('event_date') }}">
                </div>
                <div class="form-group">
                    <label for="nbParticipant">Nombre de Participant</label>
                    <input type="number" name="nbParticipant" class="form-control" >
                </div>
                

                <button type="submit" class="btn btn-success">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
