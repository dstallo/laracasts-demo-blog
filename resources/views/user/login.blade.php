@extends("layout")

@section("content")
    
    <main class="max-w-lg mx-auto mt-10 lg:mt-20">
        <x-panel heading="Log In">
            <form method="POST" action="/login">
                @csrf
                <x-form.input name="email" required autocomplete="username" />
                <x-form.input name="password" type="password" required autocomplete="current.password" />
                <x-form.button>Log In</x-form.button>
            </form>
        </x-panel>
    </main>
@endsection