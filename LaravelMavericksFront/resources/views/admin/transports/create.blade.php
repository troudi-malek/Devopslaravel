@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">

                <!-- Formulaire pour créer un nouveau transport -->
                <form action="{{ route('admin.transports.store') }}" method="POST" id="transportForm">
                    @csrf

                    <!-- Type de transport -->
                    <div class="form-group mb-3">
                        <label for="type">Type de transport</label>
                        <input type="text" name="type" class="form-control" id="type" placeholder="Ex: Bus, Train, Avion" required pattern="[A-Za-zÀ-ÿ\s]+" title="Le type de transport ne doit contenir que des lettres.">
                        <!-- Error message -->
                        <small id="typeError" class="form-text text-danger d-none">Le type de transport ne doit contenir que des lettres.</small>
                    </div>

                    <!-- Nom du transport -->
                    <div class="form-group mb-3">
                        <label for="nom">Nom du transport</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom du transport" required pattern="[A-Za-zÀ-ÿ\s]+" title="Le nom du transport ne doit contenir que des lettres.">
                        <!-- Error message -->
                        <small id="nomError" class="form-text text-danger d-none">Le nom du transport ne doit contenir que des lettres.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="{{ route('admin.transports.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript function to validate input in real-time
    document.addEventListener('DOMContentLoaded', function () {
        const typeInput = document.getElementById('type');
        const nomInput = document.getElementById('nom');
        const typeError = document.getElementById('typeError');
        const nomError = document.getElementById('nomError');

        // Function to check if the input is valid
        function validateInput(input, errorElement) {
            const regex = /^[A-Za-zÀ-ÿ\s]+$/; // Regex for alphabetic characters (including accented characters)
            if (!regex.test(input.value)) {
                errorElement.classList.remove('d-none');
                input.classList.add('is-invalid');
            } else {
                errorElement.classList.add('d-none');
                input.classList.remove('is-invalid');
            }
        }

        // Event listeners for real-time validation
        typeInput.addEventListener('input', function () {
            validateInput(typeInput, typeError);
        });

        nomInput.addEventListener('input', function () {
            validateInput(nomInput, nomError);
        });
    });
</script>

@endsection
