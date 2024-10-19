@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Liste des hébergements</h1>

    @if(session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.hebergements.create') }}" class="btn btn-primary mb-3">Ajouter un hébergement</a>
    
    <div class="col-lg-12">
        <div class="card z-index-5">
            <div class="card-header pb-0">
                <h5 class="mb-0">Hébergements</h5>
            </div>
            
            @if($hebergements->isEmpty())
                <p>Aucun hébergement trouvé.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Image</th>
                                <th>Transport</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hebergements as $hebergement)
                                <tr>
                                    <td>{{ $hebergement->id }}</td>
                                    <td>{{ $hebergement->nom }}</td>
                                    <td>{{ $hebergement->adresse }}</td>
                                    
                                    <td>
                                        @if($hebergement->image)
                                            <img src="data:image/jpeg;base64,{{ $hebergement->image }}" alt="{{ $hebergement->nom }}" style="width: 100px; height: auto;">
                                        @else
                                            No image available
                                        @endif
                                    </td>
                                    
                                    <td>{{ $hebergement->transport ? $hebergement->transport->type : 'Aucun Transport' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $hebergement->id }}">
                                            Éditer
                                        </button>

                                        <form action="{{ route('admin.hebergements.destroy', $hebergement->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet hébergement ?')">Supprimer</button>
                                        </form>

                                       <!-- Edit Modal -->
                                       <div class="modal fade" id="editModal{{ $hebergement->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $hebergement->id }}" aria-hidden="true">
                                           <div class="modal-dialog">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <h5 class="modal-title" id="editModalLabel{{ $hebergement->id }}">Modifier l'hébergement</h5>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <form action="{{ route('admin.hebergements.update', $hebergement->id) }}" method="POST" enctype="multipart/form-data" id="hebergementEditForm{{ $hebergement->id }}">
                                                           @csrf
                                                           @method('PUT')

                                                           <!-- Hébergement Name -->
                                                           <div class="form-group mb-3">
                                                               <label for="nom">Nom de l'hébergement</label>
                                                               <input type="text" name="nom" class="form-control" id="nom{{ $hebergement->id }}" value="{{ $hebergement->nom }}" required pattern="[A-Za-zÀ-ÿ\s]+" title="Le nom de l'hébergement ne doit contenir que des lettres.">
                                                               <small id="nomError{{ $hebergement->id }}" class="form-text text-danger d-none">Le nom de l'hébergement ne doit contenir que des lettres.</small>
                                                           </div>

                                                           <!-- Hébergement Address -->
                                                           <div class="form-group mb-3">
                                                               <label for="adresse">Adresse</label>
                                                               <input type="text" name="adresse" class="form-control" id="adresse{{ $hebergement->id }}" value="{{ $hebergement->adresse }}" required pattern="[A-Za-zÀ-ÿ0-9\s]+" title="L'adresse peut contenir des lettres, des chiffres et des espaces.">
                                                               <small id="adresseError{{ $hebergement->id }}" class="form-text text-danger d-none">L'adresse peut contenir des lettres, des chiffres et des espaces.</small>
                                                           </div>

                                                           <!-- Transport Association -->
                                                           <div class="form-group mb-3">
                                                               <label for="transport_id">Transport associé</label>
                                                               <select name="transport_id" class="form-control" id="transport_id{{ $hebergement->id }}" required>
                                                                   <option value="">Sélectionnez un transport</option>
                                                                   @foreach ($transports as $transport)
                                                                        <option value="{{ $transport->id }}" {{ $hebergement->transport_id == $transport->id ? 'selected' : '' }}>
                                                                            {{ $transport->type }}
                                                                        </option>
                                                                   @endforeach
                                                               </select>
                                                           </div>

                                                           <!-- Image Upload -->
                                                           <div class="form-group mb-3">
                                                               <label for="image">Image de l'hébergement</label>
                                                               <input type="file" name="image" class="form-control" id="image{{ $hebergement->id }}">
                                                           </div>

                                                           <button type="submit" class="btn btn-primary">Mettre à jour Hébergement</button>
                                                       </form>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <script>
                                           // JavaScript function to validate input in real-time for the edit modal
                                           document.addEventListener('DOMContentLoaded', function () {
                                               const nomInput = document.getElementById('nom{{ $hebergement->id }}');
                                               const adresseInput = document.getElementById('adresse{{ $hebergement->id }}');
                                               const nomError = document.getElementById('nomError{{ $hebergement->id }}');
                                               const adresseError = document.getElementById('adresseError{{ $hebergement->id }}');

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
