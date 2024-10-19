@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <form method="post" action="{{ route('conseil.store') }}">
            @csrf
            @method('post')

            <div class="row mb-3">
                <!-- Contenu Textarea -->
                <div class="input-group input-group-outline mb-3">
                    <textarea class="form-control" id="contenu" placeholder="Contenu" name="contenu">{{ old('contenu') }}</textarea>
                    @error('contenu')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Destination Select Dropdown -->
                <div class="input-group input-group-outline mb-3">
                    <select class="form-control" id="destination_id" name="destination_id">
                        <option value="" disabled selected>Select Destination</option>
                        @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}" {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                                {{ $destination->nom }} <!-- Adjust if the column name is different -->
                            </option>
                        @endforeach
                    </select>
                    @error('destination_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>

            <!-- Return Button -->
            <a href="{{ route('conseil.index') }}" class="btn btn-secondary">Return</a>
        </form>
    </div>
@endsection
