<x-app-layout>
    <div class="max-w-7xl mx-auto py-10">
        <h2 class="text-2xl font-bold mb-4">Événements disponibles</h2>

        @foreach ($events as $event)
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <h3 class="text-xl font-semibold">{{ $event->title }}</h3>
                <p class="text-gray-600">{{ $event->description }}</p>
                <p class="text-sm text-gray-500">Date : {{ $event->date }}</p>

                <form method="POST" action="{{ route('events.participate', $event->id) }}">
                    @csrf
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Participer</button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
