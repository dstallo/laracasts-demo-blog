<header class="lg:max-w-xl mx-auto lg:mt-20 mt-10 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        
        <!--  Category -->
        <x-category-dropdown :current="$currentCategory ?? null" />
        
        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="?">
            @if (request('c'))
                <input type="hidden" value="{{ request('c') }}" name="c" />
            @endif
                <input 
                    type="text" 
                    name="q" 
                    placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{ request('q') }}"
                />
            </form>
        </div>
    </div>
</header>