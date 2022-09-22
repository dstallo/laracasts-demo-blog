@props(["heading"=>null])

<main class="lg:max-w-4xl mx-auto mt-8">
@if ($heading)    
    <header class="mb-8 font-semibold text-xl uppercase"><h1>{{ $heading }}</h1></header>
@endif
    <div class="lg:flex">
        <aside class="lg:w-64 text-sm px-6">
            <ul>
                <li><x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')" class="py-1">New post</x-dropdown-item></li>
                <li><x-dropdown-item href="/admin/categories/create" :active="request()->is('admin/categories/create')" class="py-1">New category</x-dropdown-item></li>
            </ul>
        </aside>
        <section class="lg:flex-grow">
            {{ $slot }}
        </section>
    </div>
</main>