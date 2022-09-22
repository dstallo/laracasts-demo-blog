<!DOCTYPE html>
<html class="scroll-smooth">
    <head>
        <title>Laravel From Scratch Blog</title>
        <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>html {scroll-behavior: smooth;}</style>
    </head>
    <body style="font-family: Open Sans, sans-serif">
        <section class="px-6 py-6">
            <header class="lg:flex justify-between items-center">
                <div>
                    <a href="/">
                        <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                    </a>
                </div>

                <nav class="lg:mt-0 mt-8"> 
                @auth
                    <span class="text-center text-xs mr-2">Welcome</span>
                    <x-dropdown :label="auth()->user()->name" class="lg:mt-0 mt-1">
                        <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New post</x-dropdown-item>
                        <x-dropdown-item href="/admin/categories/create" :active="request()->is('admin/categories/create')">New category</x-dropdown-item>
                        <x-dropdown-item href="#" data-x="{}" @click.prevent="document.getElementById('logout-form').submit();">Log out</x-dropdown-item>
                        <form method="POST" action="/logout" id="logout-form" class="hidden"> @csrf </form>
                    </x-dropdown>
                @else
                    <a href="/register" class="text-xs font-bold uppercase hover:text-blue-500 focus:text-blue-500">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase hover:text-blue-500 focus:text-blue-500 ml-3">Log In</a>
                @endauth
                    <x-form.button type="link" href="#newsletter" class="lg:ml-4 lg:inline lg:mt-0 mt-4 block px-6">Subscribe for Updates</x-form.button>
                </nav>
            </header>

            @yield("content")

            <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
                <h5 class="text-3xl">Stay in touch with the latest posts</h5>
                <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

                <div class="mt-10">
                    <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                        <form method="POST" action="/newsletter#newsletter" class="lg:flex text-sm">
                        @csrf
                            <div class="lg:py-3 lg:px-5 flex items-center">
                                <div>
                                    <label for="newsletter" class="hidden lg:inline-block">
                                        <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                                    </label>

                                    <input id="newsletter" name="newsletter" type="text" value="{{ old('newsletter') }}" placeholder="Your email address" class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none" required/>
                                </div>
                            </div>
                            
                            <x-form.button type="submit" class="mt-4 lg:mt-0 lg:ml-3 py-3 px-8">Subscribe</x-form.button>
                        </form>
                    </div>
                </div>
            @error('newsletter')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            </footer>
        </section>
        <x-flash-message />
    </body>
</html>
