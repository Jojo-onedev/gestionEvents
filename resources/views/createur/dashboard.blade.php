@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tableau de bord du créateur</h2>
        <a href="{{ route('events.create') }}" class="btn btn-primary">Créer un événement</a>

        <h3>Mes événements</h3>
        <ul>
            @foreach(auth()->user()->events as $event)
                <li>
                    {{ $event->title }} - <a href="{{ route('events.edit', $event->id) }}">Modifier</a> |
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
