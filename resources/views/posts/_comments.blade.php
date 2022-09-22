<section class="col-span-8 col-start-5 space-y-4 mt-4">
@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
        @csrf
            <header class="flex space-x-4 items-center">
                <img src="/images/lary-avatar.svg" alt="" />
                <h2 class="text-sm">Want to participate?</h2>
            </header>
            <div class="mt-4">
                <textarea name="body" class="w-full text-sm p-2 focus:outline-none focus:ring" rows="3" placeholder="Quick! Think of something to write ..." required></textarea>
            </div>
        @error('body')
            <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
        @enderror
            <div class="mt-4 pt-4 border-t border-gray-200 text-right">
                <x-form.button type="submit">Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <x-panel>
        <header class="mb-4"><h2 class="text-sm font-semibold">Want to participate?</h2></header>
        <p class="text-xs">Quick, <a href="/register" class="font-semibold hover:underline">register</a> or <a href="/login" class="font-semibold hover:underline">log in</a> to write what you are thinking!</p>
    </x-panel>
@endauth
@foreach($post->comments as $comment)    
    <x-comment :comment="$comment" />
@endforeach
</section>