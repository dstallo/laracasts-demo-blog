@props(["name", "label", "items"])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" {{ $attributes(["class"=>"block border border-gray-200 rounded text-xs text-gray-600 p-2 w-full focus:outline-none focus:ring"]) }}>
        <option>{{ $slot }}</option>
    @foreach($items as $item)
        <option value="{{ $item->id }}" {{ old($name) == $item->id ? 'selected' : '' }}>{{ ucwords($item->name) }}</option>
    @endforeach
    </select>
@error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror
</div>