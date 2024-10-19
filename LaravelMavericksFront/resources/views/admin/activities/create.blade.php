@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une Activité</h1>

    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data" id="activitiesForm">

                    @csrf
                
                    <!-- Activity Name -->
                    <div class="form-group mb-3">
                        <label for="name">Nom de l'activité</label>
                        <input type="text" name="name" class="form-control custom-border" id="name" placeholder="Nom de l'activité" required pattern="[A-Za-zÀ-ÿ\s]+" title="Le nom de l'activité ne doit contenir que des lettres.">
                        <!-- Error message -->
                        <small id="nameError" class="form-text text-danger d-none">Le nom de l'activité ne doit contenir que des lettres.</small>
                    </div>
                
                    <!-- Activity Duration -->
                    <div class="form-group mb-3">
                        <label for="duration">Durée de l'activité (en minutes)</label>
                        <input type="number" name="duration" class="form-control custom-border" id="duration" placeholder="Durée de l'activité" required>
                    </div>
                
                    <!-- Activity Description -->
                    <div class="form-group mb-3">
                        <label for="description">Description de l'activité</label>
                        <textarea name="description" class="form-control custom-border" id="description" placeholder="Description de l'activité" required></textarea>
                    </div>
                
                    <!-- Image Upload -->
                    <div class="form-group row mb-3 align-items-center">
                        <label for="image" class="col-sm-4 col-form-label text-sm-end">Image de l'activité</label>
                        <div class="col-sm-8">
                            <input type="file" name="image" class="form-control custom-border" id="image" required accept="image/*" onchange="previewImage(event)">
                            <img id="imagePreview" class="mt-2 d-none" style="max-width: 200px; max-height: 200px;" alt="Prévisualisation de l'image" />
                        </div>
                    </div>
                
                    <!-- Submit and Cancel buttons -->
                    <div class="form-group row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary">Annuler</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview the uploaded image
    function previewImage(event) {
        const image = document.getElementById('imagePreview');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
                image.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }
    }

    // JavaScript function to validate input in real-time
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('name');
        const nameError = document.getElementById('nameError');

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
        nameInput.addEventListener('input', function () {
            const nameRegex = /^[A-Za-zÀ-ÿ\s]+$/; // Only letters and spaces
            validateInput(nameInput, nameRegex, nameError);
        });
    });
</script>

<style>
    .custom-border {
        border: 2px solid #828282; /* Black border */
        padding: 10px;
        border-radius: 5px;
    }

    .custom-border:focus {
        border-color: #007bff; /* Change border color on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>
@endsection
