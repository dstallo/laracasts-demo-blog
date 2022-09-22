@extends("layout")

@section("content")
    
    <main class="max-w-lg mx-auto mt-10 lg:mt-20">
        <x-panel heading="Register">
            <form method="POST" action="/register">
                @csrf
                <x-form.input name="name" required />
                <x-form.input name="username" required />
                <x-form.input name="email" type="email" autocomplete="username" required />
                <x-form.input name="password" type="password" autocomplete="new-password" required />
                <x-form.button>Register</x-form.button>
            </form>
        </x-panel>
    </main>
@endsection