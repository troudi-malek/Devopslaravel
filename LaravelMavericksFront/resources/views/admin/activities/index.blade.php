@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h1>Liste des activities</h1>

    @if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admin.activities.create') }}" class="btn btn-primary mb-3">Ajouter un activities</a>


<div class="col-lg-12">
    <div class="card z-index-5">
        <div class="card-header pb-0">
            <h5 class="mb-0">activities</h5>
        </div>
        
        @if($activities->isEmpty())
            <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                <p class="text-center">Aucun activité trouvé.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>duration</th>
                            <th>description</th>
                            <th>image</th>
                            <th>rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $activities)
                            <tr>
                                <td>{{ $activities->id }}</td>
                                <td>{{ $activities->name }}</td>
                                <td>{{ $activities->duration }}</td>
                                <td>{{$activities->description}}</td>
                                <td>
                                    @if($activities->image)
                                        <img src="{{ asset('storage/' . $activities->image) }}" alt="{{ $activities->name }}" style="width: 100px; height: auto;">
                                    @else
                                        No image available
                                    @endif
                                </td>
                                
                                
                                <td>{{ $activities->rating ? $activities->rating->type : 'Aucun Rating' }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $activities->id }}">
                                        Éditer
                                    </button>

                                    <form action="{{ route('admin.activities.destroy', $activities->id) }}" method="POST" style="display:inline-block;">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet activities ?')">Supprimer</button>
                                    </form>

                          <!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $activities->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $activities->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $activities->id }}">Modifier l'activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.activities.update', $activities->id) }}" method="POST" enctype="multipart/form-data" id="activitiesEditForm{{ $activities->id }}">

                    @csrf
                    @method('PUT')

                    <!-- Activity Name -->
                    <div class="form-group mb-3">
                        <label for="name">Nom de l'activité</label>
                        <input type="text" name="name" class="form-control custom-border" id="name{{ $activities->id }}" value="{{ $activities->name }}" required pattern="[A-Za-zÀ-ÿ\s]+" title="Le nom de l'activité ne doit contenir que des lettres.">
                        <small id="nameError{{ $activities->id }}" class="form-text text-danger d-none">Le nom de l'activité ne doit contenir que des lettres.</small>
                    </div>

                    <!-- Activity Duration -->
                    <div class="form-group mb-3">
                        <label for="duration">Durée de l'activité (en minutes)</label>
                        <input type="number" name="duration" class="form-control custom-border" id="duration{{ $activities->id }}" value="{{ $activities->duration }}" required>
                        <small id="durationError{{ $activities->id }}" class="form-text text-danger d-none">Durée de l'activité (en minutes).</small>
                    </div>

                    <!-- Activity Description -->
                    <div class="form-group mb-3">
                        <label for="description">Description de l'activité</label>
                        <textarea name="description" class="form-control custom-border" id="description{{ $activities->id }}" required>{{ $activities->description }}</textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group mb-3">
                        <label for="image">Image de l'activité</label>
                        <input type="file" name="image" class="form-control custom-border" id="image{{ $activities->id }}">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Mettre à jour l'activité</button>
                </form>

                <script>
                    // JavaScript function to validate input in real-time for the edit modal
                    document.addEventListener('DOMContentLoaded', function () {
                        const nameInput = document.getElementById('name{{ $activities->id }}');
                        const nameError = document.getElementById('nameError{{ $activities->id }}');

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

                        // Event listener for real-time validation
                        nameInput.addEventListener('input', function () {
                            const nomRegex = /^[A-Za-zÀ-ÿ\s]+$/; // Only letters and spaces
                            validateInput(nameInput, nomRegex, nameError);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('name{{ $activities->id }}');
        const durationInput = document.getElementById('duration{{ $activities->id }}');
        const nameError = document.getElementById('nameError{{ $activities->id }}');
        const durationError = document.getElementById('durationError{{ $activities->id }}');
    
        function validateInput(input, regex, errorElement) {
            if (!regex.test(input.value)) {
                errorElement.classList.remove('d-none');
                input.classList.add('is-invalid');
            } else {
                errorElement.classList.add('d-none');
                input.classList.remove('is-invalid');
            }
        }
    
        nameInput.addEventListener('input', function () {
            const nameRegex = /^[A-Za-zÀ-ÿ\s]+$/;
            validateInput(nameInput, nameRegex, nameError);
        });
    
        durationInput.addEventListener('input', function () {
            const durationRegex = /^[0-9]+$/; 
            validateInput(durationInput, durationRegex, durationError);
        });
    });
    </script>
    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
</div>
<style>
    .modal-content .custom-border {
    border: 2px solid #828282; /* Black border */
    padding: 10px;
    border-radius: 5px;
}

.modal-content .custom-border:focus {
    border-color: #007bff; /* Change border color on focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

</style>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery if not already included -->


<script>
$(document).ready(function() {
    // Select the success message by its ID
    var $successMessage = $('#success-message');

    // Check if the success message exists
    if ($successMessage.length) {
        // Display the message for 2 seconds (5000 milliseconds)
        $successMessage.fadeIn().delay(2000).fadeOut();
    }
});
</script>
