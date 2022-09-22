@props (["name"])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $name }}">{{ ucwords($name) }}</label>
    <textarea rows="4" name="{{ $name }}" id="{{ $name }}" {{ $attributes(["class"=>"border border-gray-200 rounded text-gray-600 text-xs p-2 w-full focus:outline-none focus:ring"]) }}>{{ old($name) }}</textarea>
@error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror
</div>