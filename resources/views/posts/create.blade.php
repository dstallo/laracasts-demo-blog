@extends("layout")

@section("content")
    <x-admin heading="Publish a new post">
        <x-panel>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" required />
                <x-form.input name="slug" required />
                <x-form.input name="thumbnail" type="file" required />
                <x-form.textarea name="brief" required />
                <x-form.textarea name="body" required />
                <x-form.select name="category_id" label="Category" :items="App\Models\Category::all()">Select a category</x-form.select>
                <x-form.button type="submit">Post</x-form.button>    
            </form>
        </x-panel>
    </x-admin>
@endsection