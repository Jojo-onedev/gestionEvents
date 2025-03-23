@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Liste des événements</h2>
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text"><strong>Date :</strong> {{ $event->date }} à {{ $event->time }}</p>
                        <p class="card-text"><strong>Lieu :</strong> {{ $event->location }}</p>
                        <p class="card-text">{{ $event->description }}</p>

                        <form action="{{ route('events.participate', $event->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Participer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
