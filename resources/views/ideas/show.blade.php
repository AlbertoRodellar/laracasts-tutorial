<x-layout title="Ideas Show">
    <div class="card bg-neutral p-6">
        <div>
            {{ $idea->description }}
        </div>
        <a href="/ideas-db/{{ $idea->id }}/edit"
            class="btn btn-primary w-fit mt-6">Edit
            Idea</a>
    </div>
</x-layout>
