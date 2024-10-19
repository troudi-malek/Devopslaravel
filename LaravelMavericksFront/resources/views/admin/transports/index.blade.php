@extends('admin.layouts.app')

@section('content')


@if(session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="container">
    <h1>Liste des transports</h1>

    <a href="{{ route('admin.transports.create') }}" class="btn btn-primary mb-3">Ajouter un transport</a>
    
    <div class="col-lg-12">
        <div class="card z-index-5">
            <div class="card-header pb-0">
                <h5 class="mb-0">Transports</h5>
                
            </div>
            
            @if($transports->isEmpty())
                <p>Aucun transport trouvé.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transports as $transport)
                                <tr>
                                    <td>{{ $transport->id }}</td>
                                    <td>{{ $transport->type }}</td>
                                    <td>{{ $transport->nom }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $transport->id }}">
                                            Éditer
                                        </button>

                                        <form action="{{ route('admin.transports.destroy', $transport->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce transport ?')">Supprimer</button>
                                        </form>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $transport->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $transport->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $transport->id }}">Modifier le transport</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.transports.update', $transport->id) }}" method="POST" id="transportEditForm{{ $transport->id }}">
                                                            @csrf
                                                            @method('PUT')

                                                            <!-- Transport Type -->
                                                            <div class="form-group mb-3">
                                                                <label for="type">Type de transport</label>
                                                                <input type="text" name="type" class="form-control" id="type{{ $transport->id }}" value="{{ $transport->type }}" required pattern="[A-Za-zÀ-ÿ\s]+" title="Le type de transport ne doit contenir que des lettres.">
                                                                <small id="typeError{{ $transport->id }}" class="form-text text-danger d-none">Le type de transport ne doit contenir que des lettres.</small>
                                                            </div>

                                                            <!-- Transport Name -->
                                                            <div class="form-group mb-3">
                                                                <label for="nom">Nom du transport</label>
                                                                <input type="text" name="nom" class="form-control" id="nom{{ $transport->id }}" value="{{ $transport->nom }}" required pattern="[A-Za-zÀ-ÿ\s]+" title="Le nom de transport ne doit contenir que des lettres.">
                                                                <small id="nomError{{ $transport->id }}" class="form-text text-danger d-none">Le nom de transport ne doit contenir que des lettres.</small>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            // JavaScript function to validate input in real-time for the edit modal
                                            document.addEventListener('DOMContentLoaded', function () {
                                                const typeInput = document.getElementById('type{{ $transport->id }}');
                                                const nomInput = document.getElementById('nom{{ $transport->id }}');
                                                const typeError = document.getElementById('typeError{{ $transport->id }}');
                                                const nomError = document.getElementById('nomError{{ $transport->id }}');

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
                                                typeInput.addEventListener('input', function () {
                                                    const typeRegex = /^[A-Za-zÀ-ÿ\s]+$/; // Only letters and spaces
                                                    validateInput(typeInput, typeRegex, typeError);
                                                });

                                                nomInput.addEventListener('input', function () {
                                                    const nomRegex = /^[A-Za-zÀ-ÿ\s]+$/; // Only letters and spaces
                                                    validateInput(nomInput, nomRegex, nomError);
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery if not already included -->

<script>
    // Wait for the DOM to be fully loaded
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
