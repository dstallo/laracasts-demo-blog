@props(["current"=>null])

<x-dropdown :label="$current ? ucwords($current->name) : 'Categories'">
    <x-dropdown-item href="/?{{ http_build_query(request()->except('c')) }}" :active="request()->routeIs('home') && request('c') === null">All</x-dropdown-item>

@foreach($categories as $category)
    <x-dropdown-item href="/?c={{ $category->slug }}&{{ http_build_query(request()->except('c')) }}" :active="$current && $current->is($category)">{{ ucwords($category->name) }}</x-dropdown-item>
@endforeach

</x-dropdown>