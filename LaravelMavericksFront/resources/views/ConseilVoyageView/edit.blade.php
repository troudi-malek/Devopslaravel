@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid py-4">
        <form method="post" action="{{ route('conseil.update', ['conseil' => $conseil]) }}">
            @csrf
            @method('put')

            <div class="row mb-3">
                <div class="input-group input-group-outline mb-3">
                    <textarea class="form-control" id="contenu" placeholder="Contenu" name="contenu">{{ $conseil->contenu }}</textarea>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control" id="destination_id" placeholder="Destination ID" name="destination_id" value="{{ $conseil->destination_id }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('conseil.index') }}" class="btn btn-secondary">Return</a>
        </form>
    </div>
    @endsection