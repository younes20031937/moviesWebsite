@extends('layouts.main')

@section('popularActors')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">
                Popular Actors
            </h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($popularActors as $actor)
                    <div class="actor mt-8 rounded-lg">
                        <a >
                            <img src="https://image.tmdb.org/t/p/w235_and_h235_face/{{ $actor['profile_path'] }}"
                                alt="{{ $actor['name'] }}"
                                class="hover:opacity-75 transition ease-in-out duration-150 rounded-t-lg"
                                data-bs-toggle="modal" data-bs-target="#actorInfoModal" data-actor-id="{{ $actor['id'] }}">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $actor['id']) }}"
                                class="text-lg hover:text-gray-300"
                                data-bs-toggle="modal" data-bs-target="#actorInfoModal" data-actor-id="{{ $actor['id'] }}">{{ $actor['name'] }}</a>
                            <div class="text-sm-truncate text-gray-400">
                                <!-- Display additional actor information here if needed -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="actorInfoModal" tabindex="-1" aria-labelledby="actorInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="actorInfoModalLabel">Actor Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="actorInfoContent">
                    <!-- Actor information will be displayed here -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Handle modal show event
            $('#actorInfoModal').on('show.bs.modal', function (event) {
                var actorId = event.relatedTarget.dataset.actorId;
                // Fetch actor information using AJAX (replace this with your actual AJAX call)
                // Example AJAX call using jQuery:
                $.ajax({
                    url: '/actors/' + actorId + '/info', // Endpoint to fetch actor information
                    type: 'GET',
                    success: function (response) {
                        // Update modal content with actor information
                        $('#actorInfoContent').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

    </script>
    <ul class="d-flex text-light">
        <li>n</li>
        <li>klfdm</li>
        <li>dsds</li>
        <li>dssdsd</li>
        <li>dsds</li>
    </ul>
@endsection
