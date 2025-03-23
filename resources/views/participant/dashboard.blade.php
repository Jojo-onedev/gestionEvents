@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tableau de bord du participant</h2>

        <h3>Événements disponibles</h3>
        <ul>
            @foreach(\App\Models\Event::all() as $event)
                <li>
                    {{ $event->title }} - {{ $event->date }}
                    <form action="{{ route('events.participate', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Participer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
