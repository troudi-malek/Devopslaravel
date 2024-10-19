@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <form method="post" action="{{ route('guide.update', ['guide' => $guide]) }}">
            @csrf
            @method('put')

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row mb-3">
                <!-- Name Field -->
                <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="nom" name="nom" value="{{ old('nom', $guide->nom) }}">
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Speciality Field -->
                <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control @error('specialite') is-invalid @enderror" id="specialite" placeholder="specialite" name="specialite" value="{{ old('specialite', $guide->specialite) }}">
                    @error('specialite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Language Field -->
                <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control @error('langue') is-invalid @enderror" id="langue" placeholder="langue" name="langue" value="{{ old('langue', $guide->langue) }}">
                    @error('langue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Contact Field -->
                <div class="input-group input-group-outline mb-3">
                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" placeholder="contact" name="contact" value="{{ old('contact', $guide->contact) }}">
                    @error('contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Return</button>
        </form>
    </div>
@endsection
