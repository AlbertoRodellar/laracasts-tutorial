@props([
    'name' => 'required',
])

@error($name)
    <p class="mt-2 text-xs text-error">{{ $message }}</p>
@enderror
