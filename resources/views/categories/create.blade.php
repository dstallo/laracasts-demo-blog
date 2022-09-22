@extends("layout")

@section("content")
    <x-admin heading="Create a new category">
        <x-panel>
            <form method="POST" action="/admin/categories">
                @csrf
                <x-form.input name="name" required />
                <x-form.input name="slug" required />
                <x-form.button type="submit">Create</x-form.button>    
            </form>
        </x-panel>
    </x-admin>
@endsection