@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-white text-center">Modifier l'événement</h2>

    <form action="{{ route('createur.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label text-white">Nom de l'événement</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text-white">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $event->description }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label text-white">Date de l'événement</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}" required>
        </div>
        <div class="mb-3">
            <label for="time">Heure</label>
            <input type="time" name="time" id="time" value="{{ $event->time }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label text-white">Localisation</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
