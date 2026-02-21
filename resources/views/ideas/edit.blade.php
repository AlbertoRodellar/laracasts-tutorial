{{-- Importante no olvidar el @csrf para evitar errores de seguridad --}}
{{-- Los @ son hidden inputs en el form, navegador necesita un get o post pero con el @method se puede usar patch, delete, etc. --}}
<x-layout title="Edit Idea">
    <form method="POST" action="/ideas-db/{{ $idea->id }}">
        @csrf
        @method('PATCH')
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Edit Your Idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3"
                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">{{ $idea->description }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex items-center  gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer hover:bg-indigo-600">Update</button>
            <button type="submit"
                form="delete-idea-form"
                class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 cursor-pointer hover:bg-red-600">Delete</button>
        </div>
    </form>
    <form id="delete-idea-form" method="POST" action="/ideas-db/{{ $idea->id }}">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
