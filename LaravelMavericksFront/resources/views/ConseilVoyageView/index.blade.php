@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid py-4">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Contenu</th>
                <th scope="col">Destination ID</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($conseils as $conseil)
                <tr>
                    <th scope="row">{{ $conseil->contenu }}</th>
                    <td>{{ $conseil->destination_id }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('conseil.edit', ['conseil' => $conseil]) }}">
                                <button type="button" class="btn btn-secondary me-2">Update</button>
                            </a>
                            <form method="post" action="{{ route('conseil.destroy', ['conseil' => $conseil]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection