@extends("layout")

@section("content")

    @include("posts._header")

    <main class="max-w-6xl mx-auto mt-6 space-y-6">
        {{ $posts->links() }}
    
    @if ($posts->count()>0) 
        <x-post-card-main :post="$posts->first()" />
        @if ($posts->count()>1)
        <div class="lg:grid lg:grid-cols-6">

            @foreach($posts->skip(1) as $post)
                <x-post-card :post="$post" class="{{ $loop->iteration<3 ? 'col-span-3' : 'col-span-2' }}" />
            @endforeach
        </div>
        @endif
    @else
        <p class="text-center">No posts yet.</p>
    @endif
   
        {{ $posts->links() }}
    </main>
@endsection