{{-- Blade directives: @if, @foreach, @forelse, @empty, @endforelse...
Hay tambien para usuarios como @auth, @guest, @admin, @can, etc... --}}
    @dump($tasks)

    @if (count($tasks))
        <p>Yes, we have some tasks. How many? {{ count($tasks) }} tasks in fact!</p>
    @endif

    {{-- @foreach ($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach --}}

    @forelse ($tasks as $task)
        <li>{{ $task }}</li>
    @empty
        <p>There are no active tasks</p>
    @endforelse
</x-layout>