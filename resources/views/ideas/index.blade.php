<x-layout title="Ideas Index">
    @if ($ideas->count())
        <div class="mt-6 text-white">
            <h2 class="font-bold">Your Ideas:</h2>
            <ul class="mt-6 mb-6 grid grid-cols-2 gap-x-6 gap-y-4">
                @foreach ($ideas as $idea)
                    <x-idea-card href="/ideas-db/{{ $idea->id }}">
                        {{ $idea->description }}
                    </x-idea-card>
                @endforeach
            </ul>
        </div>
    @else
        <p class="mt-6 text-sm/6 text-gray-400">No ideas yet. Why not create one?</p>
    @endif
    <a href="/ideas-db/create" class="text-indigo-400 hover:text-indigo-300 underline">Create a new idea</a>
</x-layout>
