{{-- Importante no olvidar el @csrf para evitar errores de seguridad --}}
<x-layout title="Ideas Create">
    <form method="POST" action="/ideas-db">
        @csrf
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Create New Idea</label>
            <div class="mt-2">
                <textarea id="description" name="description" rows="3"
                    class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"></textarea>
                <x-forms.error name="description" />
            </div>
            <p class="mt-3 text-sm/6 text-gray-400">Have an idea you'd like to share?</p>
        </div>

        <div class="mt-6 flex items-center  gap-x-6">
            <button type="submit" class="btn">Save</button>
        </div>
    </form>
</x-layout>
