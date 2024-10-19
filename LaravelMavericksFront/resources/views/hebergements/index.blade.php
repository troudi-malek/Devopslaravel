@extends('layouts.app')

@section('content')
<div class="container-fluid blog">
    <div class="container">
        <div class="session-title">
            <h2>Hebergements</h2>
            <p>Trouvez les meilleures options d’hébergement et de transport pour votre voyage.</p>
        </div>

        <div id="hebergementCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $hebergementChunks = collect($hebergements)->chunk(3); // Ensure it's a collection
                @endphp
                @foreach($hebergementChunks as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach($chunk as $hebergement)
                                <div class="col-lg-4 col-md-6">
                                    <div class="blog-col">
                                        <img src="{{ $hebergement->image_tag }}" alt="{{ $hebergement->nom }}">
                                        <h4>{{ $hebergement->nom }}</h4>
                                        <p>
                                            <strong>Adresse:</strong> {{ $hebergement->adresse }} <br>
                                            <strong>Transport:</strong> {{ $hebergement->transport->type ?? 'Aucun Transport' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#hebergementCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#hebergementCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endsection
