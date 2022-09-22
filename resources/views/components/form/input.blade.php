@props (['name'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $name }}">{{ ucwords($name) }}</label>
    <input class="border border-gray-200 rounded text-xs text-gray-600 p-2 w-full focus:outline-none focus:ring" value="{{ old($name) }}" id="{{ $name }}" name="{{ $name }}" {{ $attributes }} />
@error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror
</div>