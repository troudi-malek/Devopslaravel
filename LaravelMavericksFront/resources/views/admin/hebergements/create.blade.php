@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Hébergement</h1>

    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <form action="{{ route('admin.hebergements.store') }}" method="POST" enctype="multipart/form-data" id="hebergementForm">
                    @csrf

                    <!-- Hébergement Name -->
                    <div class="form-group mb-3">
                        <label for="nom">Nom de l'hébergement</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom de l'hébergement" required pattern="[A-Za-zÀ-ÿ\s]+" title="Le nom de l'hébergement ne doit contenir que des lettres.">
                        <!-- Error message -->
                        <small id="nomError" class="form-text text-danger d-none">Le nom de l'hébergement ne doit contenir que des lettres.</small>
                    </div>

                    <!-- Hébergement Address -->
                    <div class="form-group mb-3">
                        <label for="adresse">Adresse de l'hébergement</label>
                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse de l'hébergement" required pattern="[A-Za-zÀ-ÿ0-9\s]+" title="L'adresse peut contenir des lettres, des chiffres et des espaces.">
                        <!-- Error message -->
                        <small id="adresseError" class="form-text text-danger d-none">L'adresse peut contenir des lettres, des chiffres et des espaces.</small>
                    </div>

                    <!-- Transport Association -->
                    <div class="form-group mb-3">
                        <label for="transport_id">Transport associé</label>
                        <select name="transport_id" class="form-control" required>
                            <option value="">Sélectionnez un transport</option>
                            @foreach($transports as $transport)
                                <option value="{{ $transport->id }}">{{ $transport->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group mb-3">
                        <label for="image">Image de l'hébergement</label>
                        <input type="file" name="image" class="form-control" id="image" required>
                    </div>

                    <!-- Submit and Cancel buttons -->
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="{{ route('admin.hebergements.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript function to validate input in real-time
    document.addEventListener('DOMContentLoaded', function () {
        const nomInput = document.getElementById('nom');
        const adresseInput = document.getElementById('adresse');
        const nomError = document.getElementById('nomError');
        const adresseError = document.getElementById('adresseError');

        // Function to check if the input is valid
        function validateInput(input, regex, errorElement) {
            if (!regex.test(input.value)) {
                errorElement.classList.remove('d-none');
                input.classList.add('is-invalid');
            } else {
                errorElement.classList.add('d-none');
                input.classList.remove('is-invalid');
            }
        }

        // Event listeners for real-time validation
        nomInput.addEventListener('input', function () {
            const nomRegex = /^[A-Za-zÀ-ÿ\s]+$/; // Only letters and spaces
            validateInput(nomInput, nomRegex, nomError);
        });

        adresseInput.addEventListener('input', function () {
            const adresseRegex = /^[A-Za-zÀ-ÿ0-9\s]+$/; // Letters, numbers, and spaces
            validateInput(adresseInput, adresseRegex, adresseError);
        });
    });
</script>

@endsection
