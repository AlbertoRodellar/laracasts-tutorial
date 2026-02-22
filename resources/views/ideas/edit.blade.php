{{-- Importante no olvidar el @csrf para evitar errores de seguridad --}}
{{-- Los @ son hidden inputs en el form, navegador necesita un get o post pero con el @method se puede usar patch, delete, etc. --}}
<x-layout title="Edit Idea">
    <form method="POST" action="/ideas-db/{{ $idea->id }}">
        @csrf
        @method('PATCH')
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Edit Your Idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3" class="textarea textarea-bordered w-full">{{ $idea->description }}</textarea>
                <x-forms.error name="description" />
            </div>
        </div>

        <div class="mt-6 flex items-center  gap-x-6">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="submit" form="delete-idea-form" class="btn btn-error">Delete</button>
        </div>
    </form>
    <form id="delete-idea-form" method="POST" action="/ideas-db/{{ $idea->id }}">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
