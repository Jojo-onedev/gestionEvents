@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-white text-center">Créer un nouvel événement</h2>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label text-white">Nom de l'événement</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label text-white">Description</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label text-white">Date de l'événement</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        
        <div class="mb-3">
            <label for="name" class="form-label text-white">Localisation</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>


        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
