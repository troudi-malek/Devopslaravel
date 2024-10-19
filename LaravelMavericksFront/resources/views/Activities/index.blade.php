@extends('layouts.app')

@section('content')
<div class="container-fluid activities">
    <div class="container">
        <div class="session-title">
            <h2>Activities</h2>
            <p>Discover amazing activities to make your trip unforgettable.</p>
        </div>

        @if(empty($activities))
            <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                <p class="text-center">No activity found.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach($activities as $activity)
                    <div class="col-sm-6 col-lg-4 col-xl-4 mb-4">
                        <div class="card shadow-hover h-100">
                            <img class="card-img-top" src="{{ $activity['image_tag'] }}" alt="{{ $activity['name'] }}" style="height: 200px;">
                            <div class="card-body pb-0">
                                <h5 class="card-title fw-normal">
                                    <a href="{{ route('activities.show', $activity['id']) }}">{{ $activity['name'] }}</a>
                                </h5>
                                <p class="card-text">{{ $activity['description'] ?? 'No description available' }}</p>
                                <p class="card-text">
                                    <small class="text-muted">{{ $activity['duration'] }}</small>
                                </p>
                                <div class="text-center">
                                    <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#rateModal{{ $activity['id'] }}">
                                        Rate this activity
                                    </button>
                                </div>

                                <!-- Modal Structure -->
                                <div class="modal fade" id="rateModal{{ $activity['id'] }}" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ratingModalLabel">Rate Activity</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/activities/1/rate" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="rating" class="form-label">Rating</label>
                                                        <input type="number" class="form-control" name="rating" min="1" max="5" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="comment" class="form-label">Comment</label>
                                                        <textarea class="form-control" name="comment" rows="3" required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of card-body -->
                        </div> <!-- End of card -->
                    </div> <!-- End of column -->
                @endforeach
            </div> <!-- End of row -->
        @endif
    </div> <!-- End of container -->
</div> <!-- End of activities -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function submitRating(event, activityId) {
        event.preventDefault(); // Prevent the default form submission

        const form = document.getElementById('rateForm' + activityId);
        const formData = new FormData(form);

        fetch(`/api/rateActivity/${activityId}`, {
            method: "POST",
            body: formData,
            headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Expecting JSON from the backend
        })
        .then(data => {
            alert('Rating submitted successfully!');
            $('#rateModal' + activityId).modal('hide'); // Hide the modal after submission
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }

    // Function to show the modal
    function showRatingModal(activityId) {
        const form = document.getElementById('rateForm' + activityId);
        form.reset(); // Reset the form fields
        form.onsubmit = (event) => submitRating(event, activityId); // Set the submit handler
        $('#rateModal' + activityId).modal('show'); // Show the modal
    }
</script>

@endsection
